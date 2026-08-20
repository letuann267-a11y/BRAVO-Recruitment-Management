<?php
use App\Models\Job;
use App\Models\User;
?>
@extends('layouts.index')
@section('title')
    <title>
        {{ 'Jobs Response - BRAVO' }}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form action="{{ route('response.job.detail', $job->id  ) }}" method="GET">
            <div class="row g-0">
                <div class="col-lg-3 col-6">
                    <input id="q" name="name" class="form-control"
                        value="{{ $_GET['name'] ?? '' }}" type="text"
                        style="border-bottom-right-radius: 0px; border-top-right-radius: 0px" placeholder="Search"
                        autocomplete="off">
                </div>
                <div class="col-lg-2 col-6">
                    <select class="form-select" name="category" id="category" style="border-radius: 0px;"
                        aria-label="Default select example">
                        <option value ="" selected>Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" {{ ($_GET['category'] ?? '')== $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-6">
                    <select class="form-select" name="gender" id="gender" style="border-radius: 0px;"
                        aria-label="Default select example">
                        <option value ="" selected>Gender</option>
                        <option value="1" {{ ($_GET['gender'] ?? '') == '1' ? 'selected' : '' }}>Male</option>
                        <option value="2" {{ ($_GET['gender'] ?? '') == '2' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6">
                    <input id="q" name="age" class="form-control"
                        value="{{ $_GET['age'] ?? '' }}" type="number"
                        style="border-bottom-right-radius: 0px; border-top-right-radius: 0px" placeholder="Age"
                        autocomplete="off">
                </div>
                <div class="col-lg-3 col-12"><button type="submit" class="btn btn-dark search"
                        style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">Search</button></div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 class="text-uppercase font-weight-bolder">
                            <a href="{{ route('response.company.job')}}">List Job</a>
                            <span class="mx-2">></span>
                            <span>Jobs Response</span>
                        </h6>
                        <div class="mt-3">{{ $job->title }}</div>
                        <div style="font-weight: bold; color: red">
                            {{ $job->user->company->name }}</div>
                        <div class="row">
                            <div class="col-12 col-sm-4 mt-1"><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span>{{ $job->category->name }}</span>
                            </div>
                            <div class="col-12 col-sm-4 mt-1"><i class="fas fa-address-card"></i> <span>{{ $job->address }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><i class="fas fa-calendar-alt"></i> <span>{{ $job->startingDate }} |
                                    {{ $job->endingDate ? $job->endingDate : '' }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Price ({{ $job->price_type }}):</strong>
                                <span>${{ $job->price }}</span>
                            </div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Experience:</strong> <span>{{ $job->experience }} years</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Job Type:</strong> <span>{{ $job->job_type }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Gender:</strong> <span>{{ $job->gender == 1 ? 'Male' : 'Female' }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Job Type:</strong> <span>{{ $job->job_type }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>About Age: </strong>
                                {{ $job->startingAge }} -
                                {{ $job->endingAge }}
                            </span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Province:</strong> <span>{{ $job->province->name ?? '' }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Certificate:</strong> <span>{{ $job->certificate ?? '' }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Language:</strong> <span>{{ $job->language->name ?? '' }}</span></div>
                            <div class="col-12 col-sm-4 mt-1"><strong>Language level:</strong> <span>{{ $job->language_level ?? '' }}</span></div>
                        </div>
                    </div>
                    <div class="card-header">
                        @if (session('updated_jobRequest'))
                            <span style="color:green!important">{{ session('updated_jobRequest') }}</span>
                        @endif
                    </div>
                    <div class="card-body px-0 pb-2 pt-0">
                        <div class="table-responsive p-0">
                            <table class="align-items-center mb-0 table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Priority</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            User Name</th>
                                        <th
                                        
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Category</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Province</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Gender</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Year Age</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Language Level</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Certificate</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Created</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Link</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Options</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobsResponse as $jobResponse)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $jobResponse->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $jobResponse->priority }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $jobResponse->user->name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $jobResponse->user->email }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $jobResponse->user->category->name ?? '' }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $jobResponse->user->province?->name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $jobResponse->user->gender == 1 ? 'Male' : 'Female' }}</h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <h6 class="mb-0 text-sm">
                                                    {{ \Carbon\Carbon::parse($jobResponse->user->birthday)->age }}
                                                </h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                @foreach ($jobResponse->user->language as $language)
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $language->name}} - {{ $language->pivot->level }}
                                                    </h6>
                                                @endforeach
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <h6 class="mb-0 text-sm">{{ $jobResponse->user->certificate ?? '-' }}
                                                </h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <h6 class="mb-0 text-sm">{{ $jobResponse->created_at->diffForHumans() }}
                                                </h6>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <a class="nav-link"
                                                        href="{{ route('candidate.show', User::where('id', $jobResponse->user_id)->first()->slug) }}">Detail
                                                        Candidate</a>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($jobResponse->status == '1')
                                                            Agree
                                                        @elseif($jobResponse->status == '2')
                                                            Disagree
                                                        @else
                                                            Not Response
                                                        @endif
                                                    </h6>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                @if ($jobResponse->status === null)
                                                    <span class="text-secondary font-weight-bold text-xs">
                                                        <form
                                                            action="{{ route('job.response.update', ['id' => $jobResponse->id, 'status' => 2]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" name="disAgree_jobResponse"
                                                                style="text-decoration: none; color:rgb(201, 201, 63)!important; padding: 0; margin:0!important;text-transform: none;"
                                                                class="btn btn-link">Disagree</button>
                                                        </form>
                                                        <form
                                                            action="{{ route('job.response.update', ['id' => $jobResponse->id, 'status' => 1]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" name="agree_jobResponse"
                                                                style="text-decoration: none; color:green!important; padding: 0; margin:0!important;text-transform: none;"
                                                                class="btn btn-link">Agree</button>
                                                        </form>
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
