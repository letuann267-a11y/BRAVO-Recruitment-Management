@extends('layouts.index')
@section('title')
    <title>
        {{$user->name . " " .  $user->surname . ' - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid my-3 py-3">



        <div class="row mb-5">
            @include('includes.accountSidebar')
            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Profile -->
                @include('includes.cardProfile')

                <!-- Card Basic Info -->
                    <div class="card mt-4" id="basic-info">
                        <div class="card-header">
                            <h5>Edit profile picture</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-4">
                                            <form action="{{route('user.photo.update')}}" method="POST" enctype="multipart/form-data" id="input-form">
                                                @csrf
                                                @method('PATCH')


                                            <label for="file">
                                            <div class="avatar avatar-xxl position-relative">
                                                <img src="/images/{{$user->photo->name}}" class="border-radius-md" alt="team-2">
                                                <a class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                                    <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Image" aria-label="Edit Image"></i><span class="sr-only">Edit Image</span>
                                                </a>
                                            </div>
                                            </label>


                                            <input type="file" name="photo_id" id="file"
                                                   accept=".jpeg,.jpg,.png,.svg" style="display: none">
                                            <input type="submit" style="display: none">
                                            </form>
                                        </div>
                                        @if(auth()->user()->photo_id != 1)
                                            <form action="{{route('user.photo.destroy')}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="remove_photo" style="text-decoration: none; color:red" class="btn btn-link">Delete Photo</button>


                                            </form>
                                        @endif
                                        <form action="{{route('user.photo.update')}}" method="POST" enctype="multipart/form-data" id="input-form">
                                            @csrf
                                            @method('PATCH')
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input id="photo_id" name="photo_id" class="form-control" type="file">
                                    </div>
                                    @error('photo_id')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                            <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0 m-2">Change</button>

                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>


            </div>


</div></div>


@endsection
