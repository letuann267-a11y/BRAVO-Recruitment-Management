<?php
use App\Models\Job;
?>
@extends('layouts.index')
@section('title')
    <title>
        {{ 'Jobs Request - BRAVO' }}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Jobs Request</h6>
                    </div>
                    <div class="card-header">                  
                        @if (session('deleted_jobRequest'))
                            <span style="color:red!important">{{session('deleted_jobRequest')}}</span>
                        @endif
                    </div>
                    <div class="card-body px-0 pb-2 pt-0">
                        <div class="table-responsive p-0">
                            <table class="align-items-center mb-0 table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Address</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Price</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Applied</th>
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
                                    @foreach ($jobsRequest as $jobRequest)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $jobRequest->id }}</h6>

                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ Job::where('id', $jobRequest->job_id)->first()->title }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ Job::where('id', $jobRequest->job_id)->first()->address }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ Job::where('id', $jobRequest->job_id)->first()->price }} </h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <h6 class="mb-0 text-sm">{{ $jobRequest->created_at->diffForHumans() }}
                                                </h6>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <a class="nav-link"
                                                    href="{{ route('job.showByUser', Job::where("id", $jobRequest->job_id)->first()->slug) }}">Detail
                                                        Job
                                                    </a>                                                
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($jobRequest->status == '1')
                                                            Agree
                                                        @elseif($jobRequest->status == '2')
                                                            Disagree
                                                        @else
                                                            Not Response
                                                        @endif
                                                    </h6>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-link delete-job-request-btn" data-toggle="modal"
                                                    data-target="#confirmDeleteJobRequestModal{{ $jobRequest->id }}"
                                                    style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="confirmDeleteJobRequestModal{{ $jobRequest->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="confirmDeleteJobRequestModalLabel{{ $jobRequest->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="confirmDeleteJobRequestModalLabel{{ $jobRequest->id }}">
                                                            Confirm Deletion</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this job request?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('job.request.delete', $jobRequest->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
