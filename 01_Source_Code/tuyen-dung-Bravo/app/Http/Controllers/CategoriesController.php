<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreCategoriesRequest;
use App\Http\Requests\AdminUpdateCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $categories = Category::paginate(10);
        return view('categories.index',compact('categories', 'user'));
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
    public function store(AdminStoreCategoriesRequest $request) //luu danh muc moi tao tu form
    {
        $input = $request->all();// lay toan bo du lieu cuar request luu vao input
        Category::create($input);
        session()->flash('added_category', 'Category added sucessfully');
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
        $category = Category::findBySlugOrFail($slug);
        return view('categories.edit',compact('user','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateCategoriesRequest $request, $slug)
    {

        $category = Category::findBySlugOrFail($slug);
        $category->update($request->all());
        session()->flash('updated_category', 'Category updated successfully.');
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::findBySlugOrFail($slug);
        $category->delete();
        session()->flash('deleted_category', 'Category deleted successfully.');
        return back();
    }
}
