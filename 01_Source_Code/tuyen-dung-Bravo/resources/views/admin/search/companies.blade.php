@extends('layouts.index')
@section('styles')

@endsection
@section('title')
    <title>
        {{ 'Search Companies - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form action="{{route('admin.search.companies')}}" method="GET">
            <div class="row g-0">
                <div class="col-6">
                    <input id="s" name="q" class="form-control" value="@if(isset($_GET['q'])){{$_GET['q']}}@endif" type="text" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px" placeholder="Search companies" autocomplete="off">
                </div>

                <div class="col-6"><button type="submit" class="btn btn-dark" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">Search</button></div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Companies</h6>
                    </div>
                    @if (session('min_length_input'))
                        <span style="color:red">{{session('min_length_input')}}</span>
                    @endif
                    @if (isset($_GET['q']))
                        <span style="color:grey; margin-left: 25px;">Search results for <span style="color:red">{{$_GET['q']}}</span></span>
                        <span style="color:grey; margin-left: 25px;">{{$users_count}} companies found</span>
                        @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($users)>0)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Industry</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacity</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile Number</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td>
                                                <a href="{{route('company.show',$user->user->slug)}}">
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="/images/{{$user->user->photo->name}}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{$user->user->email}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <p class="text-xs  font-weight-bold mb-0">{{$user->industry ? $user->industry : "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$user->capacity ? $user->capacity : "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$user->address ? $user->address : "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$user->tel ? $user->tel : "/"}}</p>
                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            @else
                                <span style="color:red; margin-left: 25px;">Companies not found.</span>
                            @endif
                            <div class="d-flex justify-content-center mt-3">
                                {{$users->links()}}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

@endsection
