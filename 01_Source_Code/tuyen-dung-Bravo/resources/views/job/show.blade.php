<?php
use App\Models\Job;
use App\Models\JobRequest;
?>

@extends('layouts.index')
<?php
$jobs = Job::all();
$jobsRequest = JobRequest::all();
?>
@section('title')
    <title>
        {{ $job->title . ' - BRAVO' }}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="card-header">                  
                        @if (session('added_jobRequest'))
                            <span style="color:green!important">{{session('added_jobRequest')}}</span>
                        @endif
                    </div>
                        <h5 class="mb-4">Job details</h5>
                        <div class="row">
                        <div class="col-xl-4 col-lg-6 text-center">
                            <img class="w-100 border-radius-lg mx-auto shadow-lg"
                                src="/images/{{ $job->user->photo->name }}" alt="{{ $job->title }}">
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <h3 class="mt-lg-0 mt-4">{{ $job->title }}</h3>
                                <br>
                                <i class="fa fa-list-alt" aria-hidden="true"></i> {{ $job->category->name }}<br>
                                <i class="fas fa-address-card"></i> {{ $job->address }}<br>
                                <i class="fas fa-calendar-alt"></i> {{ $job->startingDate }} |
                                {{ $job->endingDate ? $job->endingDate : '/' }}<br>
                                <p><strong>Year Age:</strong> <span>{{ $job->startingAge }} - {{ $job->endingAge }}</span></p>
                                <h6 class="mb-0 mt-3">Price ({{ $job->price_type }}) : â‚¬{{ $job->price }}</h6>
                                <br>
                                <label style="font-size: 16px; font-weight: bold;">Description</label>
                                <br>
                                <span>
                                    {!! nl2br($job->body) !!}
                                </span>
                                <br>
                                <label style="font-size: 16px; font-weight: bold;">Responsibilities</label><br>
                                <span>
                                    {!! nl2br($job->duties) !!}
                                </span>
                                <br>
                                <label style="font-size: 16px; font-weight: bold;">Experience</label><br>
                                <span>
                                    {{ $job->experience }} years
                                </span>
                                <br>
                                <label style="font-size: 16px; font-weight: bold;">Job Type</label>
                                <br>
                                <span>
                                    {{ $job->job_type }}
                                </span>
                                <br>
                                @if (auth()->user()->role->name == 'user')
                                    @php
                                        $applied = false;
                                    @endphp
                                    @foreach ($jobsRequest as $jobRequest)
                                        @if ($jobRequest->user_id == auth()->user()->id && $jobRequest->job_id == $job->id)
                                            @php
                                                $applied = true;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if (!$applied)
                                    @if(auth()->user()->email_verified_at != null)
                                        <form action="{{ route('jobRequest.create', ['userId' => auth()->user()->id, 'jobId' => $job->id]) }}" method="POST">
                                        @Method("PATCH")    
                                        @csrf
                                            <button type="submit" name="remove_jobRequest" class="btn btn-primary btn-lg mt-4">Apply</button>
                                        </form>
                                    @endif
                                    @else
                                            <button type="button" name="remove_jobRequest" class="btn btn-success btn-lg mt-4">Applied</button>
                                    @endif
                                @endif
                                @if (auth()->user()->id == $job->user_id)

                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            <a href="{{ route('job.edit', $job->slug) }}" class="btn bg-gradient-dark mt-lg-auto w-50 mb-0 mt-2" type="button">Edit job</a>
                                        </div>
                                    <div class="col-lg-6">
                                    @if(!$job_request)
                                        <button class="btn bg-gradient-danger mt-lg-auto w-50 mb-0 mt-2"
                                            data-toggle="modal" data-target="#confirmDeleteJobModal">Delete job</button>
                                            @endif
                                    </div>
                                    </div>
                                   
                                    @endif
                                </div>
                            @if (auth()->user()->role->name == 'company' || auth()->user()->role->name == 'administrator' )
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h5 class="ms-3">Related Jobs</h5>
                                    <div class="table-responsive table">
                                        @if ($jobs)
                                            @if (count($jobs) > 0)
                                                <table class="align-items-center mb-0 table">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Job</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Price</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Address</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                                Job type</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                                Experience</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($jobs as $job)
                                                            <tr>

                                                                <td>
                                                                    <div class="d-flex px-2 py-1">
                                                                        <div>
                                                                            <a href="{{ route('job.show', $job->slug) }}">
                                                                                <img src="/images/{{ $job->user->photo->name }}"
                                                                                    class="avatar avatar-md me-3"
                                                                                    alt="table image">
                                                                            </a>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex flex-column justify-content-center">
                                                                            <a href="{{ route('job.show', $job->slug) }}">
                                                                                <h6 class="mb-0 text-sm">
                                                                                    {{ $job->title }}</h6>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>

                                                                    <p class="text-secondary mb-0 text-sm">
                                                                        {{ $job->price }}</p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-secondary mb-0 text-sm">
                                                                        {{ $job->address }}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p class="text-secondary mb-0 text-sm">
                                                                        {{ $job->job_type }}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span
                                                                        class="text-secondary text-sm">{{ $job->experience }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                            @endif
                                            </tbody>

                                            </table>
                                        @else
                                            <span style="color:red; margin-left: 25px;">No jobs found.</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal cá»­a sá»• xÃ¡c nháº­n xÃ³a cÃ´ng viá»‡c -->
        <div class="modal fade" id="confirmDeleteJobModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteJobModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteJobModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete this job?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('job.destroy', $job->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
