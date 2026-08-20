<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserChangeUsernameRequest;
use Illuminate\Http\Request;

class UserChangeUsernameController extends Controller
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
    public function edit()
    {
        $user = auth()->user();
        return view ('user.changeUsername',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserChangeUsernameRequest $request)
    {

        if (auth()->user()->username_changed == 1){
            session()->flash('username_exceeded','Username can only be changed once.');
            return back();
        }
        if (auth()->user()->username == $request->username){
            session()->flash('current_username','The new username may not be the same as the old username.');
            return back();
        }

        $request['username_changed']=1;

        $user = auth()->user();
        $user->update($request->all());
        session()->flash('username_changed','Username changed successfully.');
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
