@extends('layouts.index')
@section('title')
    <title>
        {{$user->company->name . ' - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid my-3 py-3">



        <div class="row mb-5">
            @include('includes.accountSidebar')
            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Profile -->
                @include('includes.cardProfile')
                <form action="{{route('user.password.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- Card Change Password -->
                    <div class="card mt-4" id="password">
                        <div class="card-header">
                            <h5>Change Password</h5>
                            @if(session('password_changed'))
                                <span style="color:green; ">{{session('password_changed')}}</span>
                            @endif
                        </div>




                        <div class="card-body pt-0">
                            <label class="form-label">Current Password</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="current_password" placeholder="Current Password">
                                @if(session('invalid-current-password'))
                                    <span style="color:red; ">{{session('invalid-current-password')}}</span>
                                @endif
                                @error('current_password')
                                <span style="color:red; ">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="form-label">New password</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password"  placeholder="New password">
                                @error('password')
                                <span style="color:red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <label class="form-label">Confirm new password</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm new password">
                                @error('password_confirmation')
                                <span style="color:red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <h5 class="mt-5">Password requirements</h5>
                            <p class="text-muted mb-2">
                                Please follow this guide for a strong password:
                            </p>
                            <ul class="text-muted ps-4 mb-0 float-start">
                                <li>
                                    <span class="text-sm">One special characters</span>
                                </li>
                                <li>
                                    <span class="text-sm">Min 8 characters</span>
                                </li>
                                <li>
                                    <span class="text-sm">One number (2 are recommended)</span>
                                </li>
                                <li>
                                    <span class="text-sm">Change it often</span>
                                </li>
                            </ul>
                            <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
                        </div>
                    </div>
                    <!-- Card Change Password -->
                </form>
            </div>
        </div>


@endsection
