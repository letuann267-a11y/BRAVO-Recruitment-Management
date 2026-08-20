<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function jobs(Request $request)
    {
        $categories = Category::all();
        $input = $request->q;
        $user = auth()->user();
        $category = $request->category;
        $job_type = $request->job_type;
        $price_type = $request->price_type;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);
        $jobs = Job::query();
        if ($category != '') {
            $category = Category::findBySlugOrFail($category);
            $category = $category->id;
        }
        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Please give a longer word");
                return redirect()->route('admin.jobs');
            }

            $jobs_by_word = Job::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('title', 'like', "%{$input}%")
                        ->orWhere('body', 'like', "%{$input}%")
                        ->orWhere('duties', 'like', "%{$input}%")
                        ->orWhere('address', 'like', "%{$input}%")
                        ->orWhere('experience', 'like', "%{$input}%")
                        ->orWhere('price', 'like', "%{$input}%")->orderBy('title', 'ASC');
                }
            });

            //Metoda tani duke i ndare fjalet e fjalise edhe duke kerkuar bazuar ne ato fjale
            $jobs->orWhere(DB::raw('title'), 'like', '%' . $input . '%')->orderBy('title', 'ASC'); //kerko me fjali
            if ($category != '') {
                $jobs->where('category_id', $category);
                $jobs_by_word->where('category_id', $category);
            }
            if ($job_type != '') {
                $jobs->where('job_type', $job_type);
                $jobs_by_word->where('job_type', $job_type);

            }
            if ($price_type != '') {
                $jobs->where('price_type', $price_type);
                $jobs_by_word->where('price_type', $price_type);
            }

            $jobs->union($jobs_by_word);


            $jobs = $jobs->paginate(10)->appends(request()->query());
            $jobs_count = $jobs->count();

            //Kjo appends per te marrur edhe get requestat tjere ne get metoden
            return view('admin.search.jobs', compact('jobs', 'jobs_count', 'user', 'categories'));

        } else {

            if ($category == '' && $job_type == '' && $price_type == '') {
                return redirect()->route('admin.jobs');
            }

            if ($category != '') {

                $jobs->where('category_id', $category)->toSql();
            }
            if ($job_type != '') {
                $jobs->where('job_type', $job_type);
            }
            if ($price_type != '') {
                $jobs->where('price_type', $price_type);
            }
            $jobs = $jobs->paginate(10)->appends(request()->query());
            $jobs_count = $jobs->count();
            return view('admin.search.jobs', compact('jobs', 'jobs_count', 'user', 'categories'));

        }


    }
    public function jobsResponse(Request $request)
    {
        $categories = Category::all();
        $languageUsers = DB::table('language_user')
            ->join('languages', 'language_user.language_id', '=', 'languages.id')
            ->select('language_user.level', 'languages.name', 'languages.slug', 'language_user.user_id')
            ->get();

        $uniqueLanguageUsers = collect($languageUsers)->unique(function ($item) {
            return $item->level . $item->name;
        })->values()->all();

        $input = $request->q;
        $user = auth()->user();
        $category = $request->category;
        $job_type = $request->job_type;
        $price_type = $request->price_type;
        $language_level = $request->language_level;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);
        $jobs = Job::query();
        if ($category != '') {
            $category = Category::findBySlugOrFail($category);
            $category = $category->id;
        }
        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Please give a longer word");
                return redirect()->route('response.company.job');
            }
            $jobs_by_word = Job::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('title', 'like', "%{$input}%")
                        ->orWhere('body', 'like', "%{$input}%")
                        ->orWhere('duties', 'like', "%{$input}%")
                        ->orWhere('address', 'like', "%{$input}%")
                        ->orWhere('experience', 'like', "%{$input}%")
                        ->orWhere('price', 'like', "%{$input}%")->orderBy('title', 'ASC');
                }
            });
            $jobs->orWhere(DB::raw('title'), 'like', '%' . $input . '%')->orderBy('title', 'ASC');
            if ($category != '') {
                $jobs->where('category_id', $category);
                $jobs_by_word->where('category_id', $category);
            }
            if ($job_type != '') {
                $jobs->where('job_type', $job_type);
                $jobs_by_word->where('job_type', $job_type);

            }
            if ($price_type != '') {
                $jobs->where('price_type', $price_type);
                $jobs_by_word->where('price_type', $price_type);
            }
            $jobs->union($jobs_by_word);
            $jobs = $jobs->paginate(10)->appends(request()->query());
            $jobs_count = $jobs->count();
            $user = auth()->user();
            $jobs = Job::where('user_id', $user->id)->get();
            $jobIds = $jobs->pluck('id')->toArray();
            if ($language_level != '') {
                $jobsResponse = JobRequest::whereIn('job_id', $jobIds)->get()->where('user_id', $language_level);
            } else {
                $jobsResponse = JobRequest::whereIn('job_id', $jobIds)->get();
            }
            return view('job.response-detail', compact('jobsResponse', 'categories', 'uniqueLanguageUsers'));
        }
        else{
            if ($category == '' && $job_type == '' && $price_type == ''){
                return redirect()->route('response.company.job');
            }
            if ($category != '') {
                $jobs->where('category_id', $category)->toSql();
            }
            if ($job_type != '') {
                $jobs->where('job_type', $job_type);
            }
            if ($price_type != '') {
                $jobs->where('price_type', $price_type);
            }

            $jobs = $jobs->paginate(10)->appends(request()->query());
            $jobs_count = $jobs->count();
            $user = auth()->user();
            $jobs = Job::where('user_id', $user->id)->get();
            $jobIds = $jobs->pluck('id')->toArray();
            $jobsResponse = JobRequest::whereIn('job_id', $jobIds)->get()->where('user_id', $language_level);
            return view('job.response-detail', compact('jobsResponse', 'categories', 'uniqueLanguageUsers'));
        }
    }
    public function jobsByUser(Request $request)
    {
        $categories = Category::all();
        $input = $request->q;
        $user = auth()->user();
        $salary = $request->salary;
        $age = $request->age;
        $category = $request->category;
        $job_type = $request->job_type;
        $price_type = $request->price_type;
        $language_level = $request->language_level;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);
        $jobs = Job::query();
        $languageUsers = DB::table('language_user')
            ->join('languages', 'language_user.language_id', '=', 'languages.id')
            ->select('language_user.level', 'languages.name', 'languages.slug', 'language_user.user_id')
            ->get();

        $uniqueLanguageUsers = collect($languageUsers)->unique(function ($item) {
            return $item->level . $item->name;
        })->values()->all();
        if ($category != '') {
            $category = Category::findBySlugOrFail($category);
            $category = $category->id;
        }
        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Please give a longer word");
                return redirect()->route('job.list');
            }

            $jobs_by_word = Job::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    $trimmedInput = trim($input);
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('title', 'like', "%{$trimmedInput}%")
                        ->orWhere('address', 'like', "%{$trimmedInput}%")
                        ->orWhere('duties', 'like', "%{$trimmedInput}%")
                        ->orWhere('body', 'like', "%{$trimmedInput}%");
                }
            });
            $trimmedInput = trim($input);
            $jobs->orWhere(DB::raw('title'), 'like', '%' . $trimmedInput . '%')->orderBy('title', 'ASC'); //kerko me fjali
            if ($salary != '') {
                $jobs->where(DB::raw('CAST(price AS UNSIGNED)'), '<=', (int) $salary);
                $jobs_by_word->where(DB::raw('CAST(price AS UNSIGNED)'), '<=', (int) $salary);
            }
            if ($category != '') {
                $jobs->where('category_id', $category);
                $jobs_by_word->where('category_id', $category);
            }
            if ($job_type != '') {
                $jobs->where('job_type', $job_type);
                $jobs_by_word->where('job_type', $job_type);

            }
            if ($price_type != '') {
                $jobs->where('price_type', $price_type);
                $jobs_by_word->where('price_type', $price_type);
            }

            $jobs->union($jobs_by_word);
            $jobs = $jobs->paginate(10)->appends(request()->query());
            $jobs_count = $jobs->count();
            $jobsRequest = JobRequest::all();
            return view('job.list', compact('jobs', 'jobs_count', 'user', 'jobsRequest', 'categories', 'uniqueLanguageUsers'));
        } else {
            if ($category == '' && $job_type == '' && $price_type == '' && $salary == '') {
                return redirect()->route('job.list');
            }
            if ($salary != '') {
                $jobs->where('price', '<=', $salary);
            }
            if ($age != '') {
                $jobs->where('ageFrom', '<=', $age)->where('ageTo', '>=', $age);
            }
            if ($category != '') {

                $jobs->where('category_id', $category)->toSql();
            }
            if ($job_type != '') {
                $jobs->where('job_type', $job_type);
            }
            if ($price_type != '') {
                $jobs->where('price_type', $price_type);
            }
            $jobsRequest = JobRequest::all();
            $jobs = $jobs->paginate(10)->appends(request()->query());
            $jobs_count = $jobs->count();
            return view('job.list', compact('jobs', 'jobs_count', 'jobsRequest', 'user', 'categories', 'uniqueLanguageUsers'));

        }
    }
    public function users(Request $request)
    {

        $categories = Category::all();
        $languages = Language::all();
        $input = $request->q;
        $user = auth()->user();
        $category = $request->category;
        $language = $request->language;

        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);
        $users = User::query();
        if ($category != '') {
            $category = Category::findBySlugOrFail($category);
            $category = $category->id;
        }
        if ($language != '') {
            $language = Language::findBySlugOrFail($language);
            $language = $language->id;
        }

        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Please give a longer word");
                return redirect()->route('admin.users');
            }

            $users_by_word = User::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('name', 'like', "%{$input}%")
                        ->orWhere('surname', 'like', "%{$input}%")
                        ->orWhere('username', 'like', "%{$input}%")
                        ->orWhere('slug', 'like', "%{$input}%")
                        ->orWhere('email', 'like', "%{$input}%")->orderBy('name', 'ASC');
                }
            });

            //Metoda tani duke i ndare fjalet e fjalise edhe duke kerkuar bazuar ne ato fjale
            $users->orWhere(DB::raw('CONCAT(name, " ", surname)'), 'like', '%' . $input . '%')->orderBy('name', 'ASC'); //kerko me fjali
            if ($category != '') {
                $users->where('category_id', $category);
                $users_by_word->where('category_id', $category);
            }
            if ($language != '') {
                $language = Language::find($language);
                $id = $language->user->pluck('id');
                $users->whereIn('id', $id);
                $users_by_word->whereIn('id', $id);
            }


            $users->union($users_by_word);


            $users = $users->paginate(10)->appends(request()->query());
            $users_count = $users->count();

            //Kjo appends per te marrur edhe get requestat tjere ne get metoden
            return view('admin.search.users', compact('users', 'users_count', 'user', 'categories', 'languages'));

        } else {

            if ($category == '' && $language == '') {
                return redirect()->route('admin.users');
            }

            if ($category != '') {

                $users->where('category_id', $category)->toSql();
            }
            if ($language != '') {
                $language = Language::find($language);
                $id = $language->user->pluck('id');
                $users->whereIn('id', $id);

            }
            $users = $users->paginate(10)->appends(request()->query());
            $users_count = $users->count();
            return view('admin.search.users', compact('users', 'users_count', 'user', 'categories', 'languages'));

        }


    }
    public function companies(Request $request)
    {
        $categories = Category::all();
        $user = auth()->user();
        $input = $request->q;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);

        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Please give a longer word");
                return redirect()->route('admin.users');
            }

            //Metoda tani duke i ndare fjalet e fjalise edhe duke kerkuar bazuar ne ato fjale
            $users_by_sentence = Company::Where(DB::raw('name'), 'like', '%' . $input . '%')->orderBy('name', 'ASC'); //kerko me fjali
            $users_by_word = Company::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('name', 'like', "%{$input}%")
                        ->orWhere('industry', 'like', "%{$input}%")
                        ->orWhere('capacity', 'like', "%{$input}%")
                        ->orWhere('address', 'like', "%{$input}%")
                        ->orWhere('tel', 'like', "%{$input}%")
                        ->orWhere('website', 'like', "%{$input}%")->orderBy('name', 'ASC');
                }
            });


            $users = $users_by_sentence->union($users_by_word)->paginate(10)->appends(request()->query());
            $users_count = $users->count();

            //Kjo appends per te marrur edhe get requestat tjere ne get metoden
            return view('admin.search.companies', compact('users', 'user', 'categories', 'users_count'));
        } else {

            return redirect()->route('admin.companies');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
