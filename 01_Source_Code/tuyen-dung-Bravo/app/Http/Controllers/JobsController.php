<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\Language;
use App\Models\Priority;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public $languageLevels = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2', 'N1', 'N2', 'N3', 'N4', 'N5'];
    public $certificates = ['Associate degree', "Bachelor's degree", "Master's degree", "Doctoral degree"];

    private function ensureCompanyCanRecruit()
    {
        $user = auth()->user();

        if ($user->email_verified_at == null || !$user->is_approved) {
            session()->flash('company_not_approved', 'Please verify your email and wait for admin approval before creating job offers.');
            return redirect()->route('home');
        }

        return null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($redirect = $this->ensureCompanyCanRecruit()) {
            return $redirect;
        }

        $user = auth()->user();
        $categories = Category::all();
        $provinces = Province::all();
        $languages = Language::all();

        return view('job.create', compact('user', 'categories', 'provinces', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobStoreRequest $request)
    {
        if ($redirect = $this->ensureCompanyCanRecruit()) {
            return $redirect;
        }

        $user = auth()->user();

        $category = Category::find($request->category_id);
        if (!$category) {
            session()->flash('category_error', 'Oops... Kategoria nuk u gjet.');
            return back()->withInput();
        }
        if (!$request->has_endDate && empty($request->endingDate)) {
            session()->flash('error_endDate', 'Please fill in the date.');
            return back()->withInput();
        }
        if (!$request->remote && empty($request->address)) {
            session()->flash('error_address', 'Please fill in the address.');
            return back()->withInput();
        }
        if ($request->has_endDate == 'on') {
            $request->request->remove('endDate');
        }
        if ($request->remote == 'on') {
            $request['remote'] = 1;
        } else {
            $request['remote'] = 0;
        }
        if ($request->price_type == 1) {
            $request['price_type'] = 'Fixed';
        } else {
            $request['price_type'] = 'Hourly';
        }
        if ($request->experience == 1) {
            $request['experience'] = '1-3';
        } else if ($request->experience == 2) {
            $request['experience'] = '4-7';
        } else if ($request->experience == 3) {
            $request['experience'] = '+7';
        }
        if ($request->job_type == 1) {
            $request['job_type'] = 'Part Time';
        } else if($request->job_type == 2) {
            $request['job_type'] = 'Full Time';
        }else{
            $request['job_type'] = 'partyime/full';
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $job = Job::create($input); 

        $priority = new Priority();
        $priority->job_id = $job->id;
        $priority->age = $request->input('age');
        $priority->gender = $request->input('gender_priority');
        $priority->category = $request->input('category_priority');
        $priority->language = $request->input('language_priority');
        $priority->certificate = $request->input('certificate_priority');
        $priority->province_priority = $request->input('province_priority');
        $total = $priority->age + $priority->gender + $priority->category + $priority->language + $priority->certificate + $priority->province_priority;
        $priority->total = $total;
        $priority->save();
        session()->flash('job_created', 'Job offer successfully created.');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = auth()->user();
        $job = Job::findBySlugOrFail($slug);
        $job_request = JobRequest::where('status', 1)->count();
        //other jobs by same company
        $company = User::find($job->user_id);
        $jobs = $company->job->where('id', '<>', $job->id);
        return view('job.show', compact('user','job_request', 'job', 'jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByUser($slug)
    {
        $user = auth()->user();
        $job = Job::findBySlugOrFail($slug);

        //other jobs by same company
        $company = User::find($job->user_id);
        $jobs = $company->job->where('id', '<>', $job->id);
        return view('job.show', compact('user', 'job', 'jobs'));
    }

    public function calculatePriority($jobs, $user)
    {
       
        $userAge = Carbon::parse($user->birthday)->age;
        $jobRequestIds = $user->jobRequests()->pluck('job_id')->toArray();
        foreach ($jobs as $response) {
            $priority_job = Priority::where('job_id',$response->id)->first();
            $priority = 0;

            if (in_array($response->id, $jobRequestIds)) {
                $priority = -1;
            } else {
                if ($userAge > $response->startingAge && $userAge < $response->endingAge) {
                    $priority += $priority_job->age;
                }
    
                if ($user->gender == $response->gender) {
                    $priority += $priority_job->gender_priority;
                }
    
                if ($user->province_id == $response->province_id) {
                    $priority += $priority_job->province_priority;
                }
    
                if ($user->category_id == $response->category_id) {
                    $priority += $priority_job->category_priority;
                }
                foreach ($user->language as $language) {
                    if ($language->id == $response->language_id) {
                        $findLanguageLevel = array_search($response->language_level, $this->languageLevels) ?? 8;
                        $priority += $priority_job->language;
                    }
                }
                
                $findCertificateUser = array_search($user->certificate, $this->certificates);
                $findCertificateJob = array_search($response->certificate, $this->certificates);
                if ($findCertificateJob && $findCertificateUser) {
                    if ($findCertificateUser >= $findCertificateJob) {
                        $priority += $priority_job->certificate;
                    }
                }
            }

            $response->priority = $priority;
        }

        return $jobs;
    }

    public function list(Request $request)
    {
        $user = auth()->user();
        $jobs = Job::query()
            ->when($request->title, function ($query) use ($request) {
                $query->where('title', 'Like', '%'.$request->title.'%');
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($subQuery) use ($request) {
                    $subQuery->where('slug', $request->category);
                });
            })
            ->when($request->job_type, function ($query) use ($request) {
                $query->where('job_type', $request->job_type);
            })
            ->when($request->age, function ($query) use ($request) {
                $query->where('startingAge', '<=', $request->age)
                    ->where('endingAge', '>=', $request->age);
            })
            ->when($request->salary, function ($query) use ($request) {
                $query->where('price', $request->salary);
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->whereHas('user', function ($subQuery) use ($request) {
                    $subQuery->where('gender', $request->gender);
                });
            })
            ->when($request->language_level, function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            })
            ->when($request->province_id, function ($query) use ($request) {
                $query->where('province_id', $request->province_id);
            })
            ->get();

        $jobs = $this->calculatePriority($jobs, $user);
        $jobs = $jobs->sortBy([
            ['priority', 'desc'],
        ]);

        $categories = Category::all();
        $jobsRequest = JobRequest::all();
        $languageUsers = DB::table('language_user')
            ->join('languages', 'language_user.language_id', '=', 'languages.id')
            ->select('language_user.level', 'languages.name', 'languages.slug', 'language_user.user_id')
            ->get();
        $provinces = Province::all();

        $uniqueLanguageUsers = collect($languageUsers)->unique(function ($item) {
            return $item->level . $item->name;
        })->values()->all();

        return view('job.list', compact('user', 'jobs', 'categories', 'jobsRequest', 'uniqueLanguageUsers', 'provinces'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = auth()->user();
        $categories = Category::all();
        $job = Job::findBySlugOrFail($slug);
        $priority = Priority::where('job_id',$job->id)->first();
        $provinces = Province::all();
        $languages = Language::all();

        return view('job.edit', compact('priority','user', 'categories', 'job', 'provinces', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobStoreRequest $request, $slug)
    {

        $user = auth()->user();

        $job = Job::findBySlugOrFail($slug);
        if (auth()->user()->id != $job->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $category = Category::find($request->category_id);
        if (!$category) {
            session()->flash('category_error', 'Oops... Please fill in the category.');
            return back()->withInput();
        }
        if (!$request->has_endDate && empty($request->endingDate)) {
            session()->flash('error_endDate', 'Please fill in the date.');
            return back()->withInput();
        }
        if (!$request->remote && empty($request->address)) {
            session()->flash('error_address', 'Please fill in the address.');
            return back()->withInput();
        }
        if ($request->has_endDate == 'on') {
            $request['endingDate'] = '';
        }
        if ($request->remote == 'on') {
            $request['remote'] = 1;
        } else {
            $request['remote'] = 0;
        }
        if ($request->price_type == 1) {
            $request['price_type'] = 'Fixed';
        } else {
            $request['price_type'] = 'Hourly';
        }
        if ($request->experience == 1) {
            $request['experience'] = '1-3';
        } else if ($request->experience == 2) {
            $request['experience'] = '4-7';
        } else if ($request->experience == 3) {
            $request['experience'] = '+7';
        }
        if ($request->job_type == 1) {
            $request['job_type'] = 'Part Time';
        } else if($request->job_type == 2) {
            $request['job_type'] = 'Full Time';
        }else{
            $request['job_type'] = 'partyime/full';
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $job->update($input);
        $priority = Priority::firstOrNew(['job_id' => $job->id]);
        $priority->age = $request->input('age');
        $priority->gender = $request->input('gender_priority');
        $priority->category = $request->input('category_priority');
        $priority->language = $request->input('language_priority');
        $priority->certificate = $request->input('certificate_priority');
        $priority->province_priority = $request->input('province_priority');
        $total = $priority->age + $priority->gender + $priority->category + $priority->language + $priority->certificate + $priority->province_priority;
        $priority->total = $total;
        $priority->save();
        session()->flash('job_updated', 'Job offer updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $job = Job::findBySlugOrFail($slug);

        if (auth()->user()->id != $job->user_id && auth()->user()->role->name != 'administrator') {
            abort(403, 'Unauthorized action.');
        }
        $job->delete();
        session()->flash('deleted_job', 'Job offer deleted successfully');
        if (auth()->user()->role->name == 'administrator') {
            return back();
        } else {
            return redirect()->route('home');
        }
    }
}
