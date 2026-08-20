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
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 class="text-uppercase font-weight-bolder">
                            <span>List Job</span>
                        </h6>
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
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 w-10">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Address</th>
                                        <th 
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Province</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Price</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            About age</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            About time</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Created</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Quantity</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Options</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $job->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $job->title }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $job->address }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $job->province?->name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $job->price }} $</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $job->startingAge ? $job->startingAge . ' - ' . $job->endingAge . ' age' : '' }} </h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ $job->startingDate . ' - ' . $job->endingDate }} </h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <h6 class="mb-0 text-sm">{{ $job->created_at->diffForHumans() }}
                                                </h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">{{ $job->job_requests_count }}</td>
                                            <td class="text-center align-middle">
                                                <a  href="{{ route('response.job.detail', $job->id) }}">
                                                    <button type="submit" name="disAgree_jobResponse"
                                                        style="text-decoration: none; color:rgb(201, 201, 63)!important; padding: 0; margin:0!important;text-transform: none;"
                                                        class="btn btn-link">Detail</button>
                                                </a>
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
