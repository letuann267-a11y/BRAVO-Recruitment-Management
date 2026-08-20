<?php

namespace App\Http\Controllers;

use App\Mail\DeleteMail;
use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.index',compact('user'));
    }

    public function users(){
        $user = auth()->user();
        $categories = Category::all();
        $languages = Language::all();
        $users = User::where('role_id', 1)
                    ->where('is_deleted', 0)
                    ->paginate(20);
        return view('admin.users',compact('user','users', 'categories','languages'));
    }
    public function companies(){
        $user = auth()->user();

        $users = User::with(['company', 'photo'])
                    ->where('role_id',2)
                    ->where('is_deleted', 0)
                    ->whereHas('company')
                    ->paginate(20);
        return view('admin.companies',compact('user','users'));
    }

    public function approveCompany($slug)
    {
        $user = User::findBySlugOrFail($slug);

        if ($user->role->name != 'company') {
            abort(404);
        }

        $user->is_approved = 1;
        $user->save();

        session()->flash('approved_company', 'Company account approved successfully');
        return back();
    }

    public function admins(){
        $user = auth()->user();
        $users = User::Where('role_id',3)->paginate(20);
        return view('admin.admins',compact('user','users'));
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
    public function destroy($slug)
    {
        $user = User::findBySlugOrFail($slug);
        $user->is_deleted = 1;
        $user->save();
        $email = $user->email;
        Mail::to($email)->send(new DeleteMail($user));
        session()->flash('deleted_user', 'User deleted successfully');
        return back();
    }
}
