@extends('layouts.index')
@section('title')
    <title>
        {{$user->name . " " .  $user->surname . ' - BRAVO'}}
    </title>
@endsection
@section('scripts')
    <script src="{{asset('/assets/js/script.js')}}"></script>
@endsection
        @section('content')
            <div class="container-fluid my-3 py-3">

                <div class="row mb-5">
                    @include('includes.accountSidebar')
                    <div class="col-lg-9 mt-lg-0 mt-4">
                        <!-- Card Profile -->
                        @include('includes.cardProfile')
                        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- Card Basic Info -->
                            <div class="card mt-4" id="basic-info">
                                <div class="card-header">
                                    <h5>Basic Information</h5>
                                    @if (session('profile_updated'))
                                        <span style="color:green">{{session('profile_updated')}}</span>
                                    @endif
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Name</label>
                                            <div class="input-group">
                                                <input id="name" name="name" class="form-control" type="text" placeholder="{{$user->name}}" required="required" autocomplete="off" value="{{$user->name}}">
                                            </div>
                                            @error('name')
                                            <span style="color:red; ">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Surname</label>
                                            <div class="input-group">
                                                <input id="surname" name="surname" class="form-control" type="text" placeholder="{{$user->surname}}" required="required" autocomplete="off" value="{{$user->surname}}">
                                            </div>
                                            @error('surname')
                                            <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label mt-4">About</label>
                                            <div class="input-group">
                                                <textarea id="about" name="about" class="form-control" rows="5">{{$user->about}}</textarea>

                                            </div>
                                            @error('about')
                                            <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Email</label>
                                            <div class="input-group">
                                                <input id="email" name="email" class="form-control" type="email" placeholder="{{$user->email}}" value="{{$user->email}}">
                                            </div>
                                            @error('email')
                                            <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Category</label>
                                            <div class="input-group">
                                                <select class="form-select" name="category_id" aria-label="Default select example">
                                                    <option value="" selected>Choose Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{ $user->category->id == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
                                                    @endforeach
                                                </select>                                            </div>
                                            @error('category')
                                            <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                            @if (session('category_error'))
                                                <span style="color:red;">{{ session('category_error')  }}</span>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Gender</label>
                                            <div class="input-group">
                                                <select class="form-select" name="gender" aria-label="Default select example">
                                                    <option value = "" selected>Choose Gender</option>
                                                    <option value = "1" {{ $user->gender == 1 ? 'selected' : ''}} >Male</option>
                                                    <option value = "2" {{ $user->gender == 2 ? 'selected' : ''}} >Female</option>
                                                </select>
                                            </div>
                                            @error('gender')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Phone number</label>
                                            <div class="input-group">
                                                <input id="phone_number" name="phone_number" class="form-control" type="phone_number" placeholder="Phone number" value="{{old('phone_number') ?? $user->phone_number}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Birthday</label>
                                            <div class="input-group">
                                                <input id="birthday" name="birthday" class="form-control" type="date" placeholder="{{\Carbon\Carbon::parse($user->birthday)->format('Y-m-d')}}" value="{{\Carbon\Carbon::parse($user->birthday)->format('Y-m-d')}}">
                                            </div>
                                            @error('birthday')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Province</label>
                                            <div class="input-group">
                                                <select class="form-select" name="province_id" aria-label="Default select example">
                                                    <option value="" selected>Choose Province</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{$province->id}}" {{ $user->province_id == $province->id ? 'selected' : ''}} >{{$province->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('province_id')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Certificate</label>
                                            <select class="form-select" name="certificate" aria-label="Default select example">
                                                <option value = "" selected>Choose Certificate</option>
                                                <option value = "Associate degree" {{ $user->certificate == 'Associate degree' ? 'selected' : ''}}>Associate degree</option>
                                                <option value = "Bachelor's degree" {{ $user->certificate == "Bachelor's degree" ? 'selected' : ''}}>Bachelor's degree</option>
                                                <option value = "Master's degree" {{ $user->certificate == "Master's degree" ? 'selected' : ''}}>Master's degree</option>
                                                <option value = "Doctoral degree" {{ $user->certificate == "Doctoral degree" ? 'selected' : ''}}>Doctoral degree</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">CV</label>
                                            <div class="input-group">
                                                <input id="cv" name="cv" class="form-control" type="file">
                                            </div>
                                            @error('cv')
                                            <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">CV Template</label>
                                            <div class="input-group">
                                                <a href="{{asset('/assets/files/Europass-CV.docx')}}" download> Click here to download CV template </a>
                                            </div>

                                        </div>

                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">LinkedIn</label>
                                            <div class="input-group">
                                                <input id="linkedin" name="linkedin" class="form-control" type="text" placeholder="Write LinkedIn username" value="{{$user->linkedin}}" autocomplete="off">
                                            </div>
                                            @error('linkedin')
                                            <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Facebook</label>
                                            <div class="input-group">
                                                <input id="facebook" name="facebook" class="form-control" type="text" placeholder="Write Facebook username" value="{{$user->facebook}}" autocomplete="off">
                                            </div>
                                            @error('facebook')
                                            <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div> --}}
                                    <br>

                                    <div class="language-row">
                                        @if (count($user->language) >0)
                                        @foreach($user->language as $userLanguage)
                                        <div class = "row">
                                            <div class="col-sm-6 col-12">
                                                <label class="form-label mt-2">*Language <span style="color:red; cursor:pointer" class="remove-language">(remove)</span></label>
                                                <select class="form-select" name="language_id[]" aria-label="Default select example">
                                                    <option value = "" selected>Choose Language</option>
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->id}}" {{ $language->id == $userLanguage->id ? 'selected' : ''}}>{{$language->name}}</option>
                                                    @endforeach
                                                </select>


                                            </div>

                                            <div class="col-sm-6 col-12">
                                                <label class="form-label mt-2">*Level of knowledge</label>
                                                <select class="form-select" name="level[]" aria-label="Default select example">
                                                    <option value = "" selected>Choose Level</option>

                                                    <option value="A1" {{ $userLanguage->pivot->level == 'A1' ? 'selected' : ''}}>A1</option>
                                                    <option value="A2" {{ $userLanguage->pivot->level == 'A2' ? 'selected' : ''}}>A2</option>
                                                    <option value="B1" {{ $userLanguage->pivot->level == 'B1' ? 'selected' : ''}}>B1</option>
                                                    <option value="B2" {{ $userLanguage->pivot->level == 'B2' ? 'selected' : ''}}>B2</option>
                                                    <option value="C1" {{ $userLanguage->pivot->level == 'C1' ? 'selected' : ''}}>C1</option>
                                                    <option value="C2" {{ $userLanguage->pivot->level == 'C2' ? 'selected' : ''}}>C2</option>
                                                    <option value="N1" {{ $userLanguage->pivot->level == 'N1' ? 'selected' : ''}}>N1</option>
                                                    <option value="N2" {{ $userLanguage->pivot->level == 'N2' ? 'selected' : ''}}>N2</option>
                                                    <option value="N3" {{ $userLanguage->pivot->level == 'N3' ? 'selected' : ''}}>N3</option>
                                                    <option value="N4" {{ $userLanguage->pivot->level == 'N4' ? 'selected' : ''}}>N4</option>
                                                    <option value="N5" {{ $userLanguage->pivot->level == 'C1' ? 'selected' : ''}}>N5</option>
                                                
                                                </select>

                                            </div>
                                        </div>
                                            @endforeach
                                        @else
                                            <div class = "row">
                                                <div class="col-sm-6 col-12">
                                                    <label class="form-label mt-2">*Language <span style="color:red; cursor:pointer" class="remove-language">(remove)</span></label>
                                                    <select class="form-select" name="language_id[]" aria-label="Default select example">
                                                        <option value = "" selected>Choose Language</option>
                                                        @foreach($languages as $language)
                                                            <option value="{{$language->id}}">{{$language->name}}</option>
                                                        @endforeach
                                                    </select>


                                                </div>

                                                <div class="col-sm-6 col-12">
                                                    <label class="form-label mt-2">*Level of knowledge</label>
                                                    <select class="form-select" name="level[]" aria-label="Default select example">
                                                        <option value = "" selected>Choose Level</option>

                                                        <option value="A1">A1</option>
                                                        <option value="A2">A2</option>
                                                        <option value="B1">B1</option>
                                                        <option value="B2">B2</option>
                                                        <option value="C1">C1</option>
                                                        <option value="C2">C2</option>
                                                        <option value="N1">N1</option>
                                                        <option value="N2">N2</option>
                                                        <option value="N3">N3</option>
                                                        <option value="N4">N4</option>
                                                        <option value="N5">N5</option>

                                                    </select>

                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    @if (session('language_error'))
                                        <span style="color:red">{{session('language_error')}}</span>
                                        <br>
                                    @endif
                                    @if (session('level_error'))
                                        <span style="color:red">{{session('level_error')}}</span>
                                        <br>
                                    @endif

                                    @error('language_id.*')
                                    <span style="color:red;">{{ $message }}</span>
                                    <br>
                                    @enderror
                                    @error('language_id')
                                    <span style="color:red;">{{ $message }}</span>
                                    <br>
                                    @enderror

                                    @error('level.*')
                                    <span style="color:red;">{{ $message }}</span>
                                    <br>
                                    @enderror
                                    @error('level')
                                    <span style="color:red;">{{ $message }}</span>
                                    <br>
                                    @enderror

                                    <button type="button" class="btn btn-secondary add-language mt-2">+ Add</button>

                                    <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update Profile</button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>

@endsection

