<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $languages = Language::paginate(10);
        return view('admin.languages.index',compact('languages', 'user'));
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
        $input = $request->all();
        $request->validate(['name'=>'required|max:255']);
        Language::create($input);
        session()->flash('added_language', 'Language added sucessfully');
        return back();
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
    public function edit($slug)
    {
        $user = auth()->user();
        $language = Language::findBySlugOrFail($slug);
        return view('admin.languages.edit',compact('user','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate(['name'=>'required|max:255']);
        $language = Language::findBySlugOrFail($slug);
        $language->update($request->all());
        session()->flash('updated_language', 'Language updated successfully.');
        return redirect()->route('languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $language = Language::findBySlugOrFail($slug);
        foreach ($language->user as $languageUser){
            $user_id = $languageUser->id;
            $language->user()->detach($user_id);

        }

        $language->delete();
        session()->flash('deleted_language', 'Language deleted successfully.');
        return back();
    }
}
