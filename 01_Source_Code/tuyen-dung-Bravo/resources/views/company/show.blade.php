@extends('layouts.index')
@section('title')
<title>
    {{$user->company->name . ' - BRAVO'}}
</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{asset('/assets/img/curved-images/curved0.jpg')}}'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="/images/{{$user->photo->name}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$user->company->name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{$user->name . " ". $user->surname}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-xl-4 ">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Overall Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{route('company.edit')}}">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Change profile"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">

                    <hr class="horizontal gray-light my-1">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                Name:</strong> &nbsp; {{$user->name . " ". $user->surname}}</li>
                        @if ($user->email)
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong><a href="mailto:{{$user->email}}"> {{$user->email}}</a> </li>@endif
                        @if($user->company->name) <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Company Name:</strong> &nbsp;{{$user->company->name}}</li>@endif
                        @if($user->company->industry) <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Industry:</strong> &nbsp;{{$user->company->industry}}</li>@endif
                        @if($user->company->capacity) <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Capacity:</strong> &nbsp;{{$user->company->capacity}}</li>@endif
                        @if($user->company->address) <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp;{{$user->company->address}}</li>@endif
                        @if($user->company->tel) <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile Number:</strong> &nbsp;&nbsp;{{$user->company->tel}}</li>@endif
                        @if($user->company->website) <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Website:</strong> &nbsp;{{$user->company->website}}</li>@endif
                        @if ($user->facebook || $user->linkedin)
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                            @if ($user->facebook)
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="https://facebook.com/{{$user->facebook}}">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            @endif
                            @if ($user->linkedin)
                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="https://www.linkedin.com/in/{{$user->linkedin}}">
                                <i class="fab fa-linkedin fa-lg"></i>
                            </a>
                            @endif
                            @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-8 mt-md-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Description</h6>
                </div>
                <div class="card-body p-3">
                    @if ($user->about)
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">About</h6>
                    <p class="text-sm">
                        {{$user->about}}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-1">Jobs</h6>
                    <p class="text-sm">All posted jobs</p>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{route('response.company.job')}}">
                                <div class="card" style="background-color: #b87c30; text-align: center;">

                                    <div class="textBox">
                                        <div class="textContent">
                                            <p class="h4">Total Jobs </p>

                                        </div>
                                        <p class="h1">{{$jobs->count()}}</p>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="card" style="background-color: #f76f36; text-align: center;">
                                <div class="img"></div>
                                <div class="textBox">
                                    <div class="textContent">
                                        <p class="h4">Agree</p>

                                    </div>
                                    <p class="h1">{{$job_request}}</p>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-5" style="margin-bottom: 50px;">
                            @if(auth()->user()->email_verified_at == null)
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <span class="text-danger" style="font-weight: bold;">PLEASE VERIFY YOUR MAIL BEFORE
                                        CREATE JOB</span>
                                </div>
                            </div>
                            @elseif(!auth()->user()->is_approved)
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <span class="text-danger" style="font-weight: bold;">PLEASE WAIT FOR ADMIN APPROVAL BEFORE CREATE JOB</span>
                                </div>
                            </div>
                            @else
                            <a href="{{ route('job.create') }}">
                                <div class="card h-100 card-plain border">
                                    <div class="card-body d-flex flex-column justify-content-center text-center">
                                        <i class="fa fa-plus text-secondary mb-3"></i>
                                        <h5 class="text-secondary">Create job</h5>
                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                        @foreach($jobs as $job)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-5">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <a href="{{route('job.showByUser',$job->slug)}}"> <img src="/images/{{$user->photo->name}}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl"></a>
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">{{$job->category->name}}</p>
                                    <a href="{{route('job.showByUser',$job->slug)}}">
                                        <h5>
                                            {{Str::limit($job->title,20)}}
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        {{Str::limit($job->body,70)}}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        @if(auth()->user()->role->name=='company')
                                        <a href="{{route('job.show',$job->slug)}}" class="btn btn-outline-primary btn-sm mb-0">See job</a>
                                        @else
                                        <a href="{{route('job.showByUser',$job->slug)}}" class="btn btn-outline-primary btn-sm mb-0">See job</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{$jobs->links()}}
                </div>
            </div>
        </div>
    </div>

    @endsection
