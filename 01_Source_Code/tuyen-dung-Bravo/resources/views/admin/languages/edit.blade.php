@extends('layouts.index')
@section('title')
    <title>
        {{ $language->name.' - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form action="{{route('admin.language.update',$language->slug)}}" method="POST">
        @csrf
        @method('PATCH')
        <!-- Card Basic Info -->
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Update Language</h5>

                </div>
                <div class="card-body pt-0">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-6 col-12">
                            <label class="form-label">Language</label>
                            <div class="input-group">
                                <input id="name" name="name" class="form-control" type="text" placeholder="Write Language" required="required" value="{{$language->name}}" autocomplete="off">
                            </div>
                            @error('name')
                            <span style="color:red; ">{{ $message }}</span>
                            @enderror
                            <button class="btn bg-gradient-dark btn-sm float-end mt-2 mb-0">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


@endsection
