<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangeProfileRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
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
    public function show($slug)
    {
        $user = User::findBySlugOrFail($slug);
        if ($user->role->name == 'company'){
            return redirect()->route('home');//redirekto nese nuk eshte perdorues
        }
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        $categories = Category::all();
        $languages = Language::all();
        $provinces = Province::all();

        if ($user->role->name == 'company'){
            return redirect()->route('home');//redirekto nese nuk eshte perdorues
        }
        return view('user.edit',compact('user', 'categories','languages', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function addLanguages(array $data,$user){
        $count = count($data['language_id']);
        $added_languages = [];
        //first check if the language exists
        for($i=0;$i<$count;$i++) {

            $lang = Language::find($data['language_id'][$i]);

            if (!$lang){
                session()->flash('language_error', 'Oops ... Language not found.');
                return;
            }
            if ($data['level'][$i] != 'A1' && $data['level'][$i] != 'A2' && $data['level'][$i] != 'B1' && $data['level'][$i] != 'B2' && $data['level'][$i] != 'C1' && $data['level'][$i] != 'C2'){
                session()->flash('level_error', 'Oops ... Language Level not found.');
                return;
            }

        }

        //if success remove all user languages
        foreach ($user->language as $language){
            $user->language()->detach($language);
        }

        //insert new languages
        for($i=0;$i<$count;$i++) {

            if (!in_array($data['language_id'][$i], $added_languages)) {


                $user->language()->attach($data['language_id'][$i], array('level' => $data['level'][$i]));
                array_push($added_languages, $data['language_id'][$i]);
            }

        }

    }

    public function update(UserEditRequest $request)
    {
    $user = auth()->user();
        $category = Category::find($request->category_id);
        if (!$category){
            session()->flash('category_error', 'Oops ... Category not found.');
            return back();
        }
        $input = $request->all();
        $this->addLanguages($input, $user);
        if($file = $request->file('cv')) {

            $file_name = time() . $file->getClientOriginalName();
            $file->move('files',$file_name);
            if ($user->cv) {
                if (file_exists(public_path() . '/files/' . $user->cv)) {
                    unlink(public_path() . '/files/' . $user->cv);
                }
            }
            $input['cv'] = $file_name;
        }

            $user->update($input);
            session()->flash('profile_updated', 'Profile changed successfully.');

            return redirect()->back();

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
