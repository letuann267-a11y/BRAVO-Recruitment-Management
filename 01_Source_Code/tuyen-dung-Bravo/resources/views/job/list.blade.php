@extends('layouts.staticIndex')
@section('styles')
<style>
    .form-control {
        height: 40px;
        width: 100%;
        padding: 0 12px;
    }
    .row div[class^="col-"]:not(.row) {
        margin-bottom: 0px
    }
    button.search {
        height: 100%;
        width: 100px;
    }
</style>
@endsection
@section('title')
    <title>
        {{ 'Jobs - BRAVO' }}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-2">
        <form action="{{ route('job.list') }}" method="GET">
            <div class="row g-0 align-items-center justify-content-center mb-1">
                <div class="col-lg-3 col-6">
                    <input id="title" name="title" class="form-control"
                        value="{{ $_GET['title'] ?? '' }}" type="text"
                        style="border-bottom-right-radius: 0px; border-top-right-radius: 0px; border: 1px solid #ced4da; padding: 10px;"
                        placeholder="Search" autocomplete="off">
                </div>

                <div class="col-lg-2 col-6">
                    <select class="form-control" name="category" id="category" style="border-radius: 0px;"
                        aria-label="Default select example">
                        <option value ="" selected>Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" {{ ($_GET['category'] ?? '')== $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-6">
                    <select class="form-control" name="job_type" id="job_type" aria-label="Default select example"
                        style="border-radius: 0px;">
                        <option value="" selected>Job Type</option>
                        <option value="Part Time" {{ ($_GET['job_type'] ?? '') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                        <option value="Full Time" {{ ($_GET['job_type'] ?? '') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                    </select>
                </div>

                <div class="col-lg-2 col-6">
                    <select class="form-control" name="price_type" id="price_type" aria-label="Default select example"
                        style="border-radius: 0px;">
                        <option value="" selected>Payment</option>
                        <option value="Fixed" {{ ($_GET['price_type'] ?? '') == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                        <option value="Hourly" {{ ($_GET['price_type'] ?? '') == 'Hourly' ? 'selected' : '' }}>Hourly</option>
                    </select>
                </div>

                <div class="col-lg-2 col-6">
                    <input class="form-control" type="number" name="age" placeholder="Age" value="{{ $_GET['age'] ?? '' }}">
                </div>

                <div class="col-lg-2 col-6">
                    <input class="form-control" type="number" name="salary" placeholder="Salary" value="{{ $_GET['salary'] ?? '' }}">
                </div>
                <div class="col-lg-2 col-6">
                    <select class="form-control" name="province_id" id="province_id" style="border-radius: 0px;"
                        aria-label="Default select example">
                        <option value="" selected>Province</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}"
                                {{ ($_GET['province_id'] ?? '') == $province->id ? 'selected' : '' }}
                            >
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-lg-2 col-6">
                    <select class="form-control" name="language_level" id="language_level" style="border-radius: 0px;"
                        aria-label="Default select example">
                        <option value="" selected>Language Level</option>
                        @foreach ($uniqueLanguageUsers as $languageUser)
                            <option value="{{ $languageUser->user_id }}"
                                {{ ($_GET['language_level'] ?? '') == $languageUser->user_id ? 'selected' : '' }}
                            >
                                {{ $languageUser->name . '-' . $languageUser->level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-12 mb-3">
                    <button type="submit" class="btn btn-dark search" style="border-radius: 0px;">Search</button>
                </div>
            </div>
        </form>
        <div class="card-header">
            @if (session('added_jobRequest'))
                <span style="color:green!important">{{ session('added_jobRequest') }}</span>
            @endif
        </div>
        <div class="row mb-3">
            @if (count($jobs) > 0)
                @foreach ($jobs as $job)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <img class="w-100 border-radius-lg shadow-lg"
                                            src="/images/{{ $job->user->photo->name }}" alt="{{ $job->title }}">
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="mt-1">{{ $job->title }}</h3>
                                        <p style="font-weight: bold; color: red; font-size: 24px;">
                                            {{ $job->user->company->name }}</p>
                                        <p><i class="fa fa-list-alt" aria-hidden="true"></i>
                                            <span>{{ $job->category->name }}</span>
                                        </p>
                                        <p><i class="fas fa-address-card"></i> <span>{{ $job->address }}</span></p>
                                        <p><i class="fas fa-calendar-alt"></i> <span>{{ $job->startingDate }} |
                                                {{ $job->endingDate ? $job->endingDate : '' }}</span></p>
                                        <p><strong>Price ({{ $job->price_type }}):</strong>
                                            <span>${{ $job->price }}</span>
                                        </p>
                                        <div>
                                            <p><strong>Experience:</strong> <span>{{ $job->experience }} years</span></p>
                                            <p><strong>Job Type:</strong> <span>{{ $job->job_type }}</span></p>
                                        </div>
                                        <div>
                                            <p><strong>Province:</strong> <span>{{ $job->province->name }}</span></p>
                                            <p><strong>Year Age:</strong> <span>{{ $job->startingAge }} - {{ $job->endingAge }}</span></p>
                                        </div>
                                        <p><strong>Gender:</strong> <span>{{ $job->gender == 1 ? 'Male' : 'Female' }}</span></p>
                                        @if ($job->certificate)
                                            <p><strong>Certificate:</strong> <span>{{ $job->certificate ?? ''}}</span></p>
                                        @endif
                                        <div class="d-flex mt-3 justify-between">
                                            <a href="{{ route('job.showByUser', $job->slug) }}"
                                                class="btn btn-primary mr-2">See job</a>
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
                                                @if (auth()->user()->email_verified_at != null)
                                                    <form
                                                        action="{{ route('jobRequest.create', ['userId' => auth()->user()->id, 'jobId' => $job->id]) }}"
                                                        method="POST">
                                                        @Method('PATCH')
                                                        @csrf
                                                        <button type="submit" name="remove_jobRequest"
                                                            class="btn btn-primary">Apply</button>
                                                    </form>
                                                @endif
                                            @else
                                                <button type="button" name="remove_jobRequest"
                                                    class="btn btn-success">Applied</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center" style="color: red; font-size: 18px; font-weight: bold;">No jobs found</p>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let salary;
        output.innerHTML = slider.value;
        slider.oninput = function() {
            output.innerHTML = this.value;
            salary = this.value;
        }
        const searchBtn = document.querySelector('.search');
        searchBtn.addEventListener('click', function() {

            const searchField = document.querySelector('#q');
            const categoriesBtn = document.getElementById('category');
            const categoryValue = categoriesBtn.options[categoriesBtn.selectedIndex].text;

            const jobtypeBtn = document.getElementById('job_type');
            const jobtypeValue = jobtypeBtn.options[jobtypeBtn.selectedIndex].text;

            const pricetypeBtn = document.getElementById('price_type');
            const pricetypeValue = pricetypeBtn.options[pricetypeBtn.selectedIndex].text;

            if (searchField.value == '') {
                searchField.disabled = true;
            }
            if (categoryValue == 'Categories') {
                categoriesBtn.disabled = true;
            }
            if (jobtypeValue == 'Job Type') {
                jobtypeBtn.disabled = true;
            }
            if (pricetypeValue == 'Price Type') {
                pricetypeBtn.disabled = true;
            }

        });
    </script>
@endsection
