@extends('layouts.index')
@section('title')
    <title>
        {{ 'Users - BRAVO'}}
    </title>
@endsection
@section('styles')
    <style>
        @media screen and (max-width: 1000px) {
            .btn {
                border-radius: 0.5rem !important;


                margin-top: 20px;
                width: 100%;
            }
            #q{
                border-radius: 0px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form action="{{route('admin.search.users')}}" method="GET">
            <div class="row g-0">
                <div class="col-lg-4 col-12">
                    <input id="q" name="q" class="form-control" type="text" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px" placeholder="Search Users" autocomplete="off">
                </div>
                <div class="col-lg-2 col-6">
                    <select class="form-select" name="category" id="category" style="border-radius: 0px;" aria-label="Default select example">
                        <option value ="" selected>Categories</option>
                        @foreach($categories as $category)
                            <option value="{{$category->slug}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-lg-2 col-6">
                    <select class="form-select" name="language" id="language" style="border-radius: 0px;" aria-label="Default select example">
                        <option value ="" selected>Languages</option>
                        @foreach($languages as $language)
                            <option value="{{$language->slug}}">{{$language->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-lg-3 col-12"><button type="submit" class="btn btn-dark search" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">Search</button></div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Users</h6>
                    </div>
                    <div class="card-header">                  
                        @if (session('deleted_user'))
                            <span style="color:red!important">{{session('deleted_user')}}</span>
                        @endif
                    </div>
                    @if (session('min_length_input'))
                        <span style="color:red; margin-left: 25px">{{session('min_length_input')}}</span>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($users)>0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CV</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registered</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                <tr>
                                    <td>
                                        <a href="{{route('user.show',$user->slug)}}">
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="/images/{{$user->photo->name}}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$user->name. " ". $user->surname}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                            </div>
                                        </div>
                                        </a>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$user->category ? $user->category->name : "/"}}</p>

                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold mb-0">{{$user->username ? $user->username : "/"}}</p>

                                    </td>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold mb-0">@if ($user->cv) <a href="/files/{{$user->cv}}"><img src="{{asset('/assets/img/pdf.webp')}}" style="width: 20px"></a>@else {{'/'}}@endif</p>

                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$user->created_at->diffForHumans()}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <button class="btn btn-link delete-user-user-btn" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" type="button" data-toggle="modal" data-target="#confirmDeleteModal{{$user->id}}">Delete</button>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>

                            </table>
                            @else
                                <span style="color:red; margin-left: 25px;">Users not found.</span>
                            @endif
                            <div class="d-flex justify-content-center mt-3">
                                {{$users->links()}}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
<!-- Modal cá»­a sá»• xÃ¡c nháº­n xÃ³a danh má»¥c -->
@foreach($users as $user)
<div class="modal fade" id="confirmDeleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel{{$user->id}}">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this User?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{route('admin.user.destroy',$user->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
        @section('scripts')
            <script>
                const searchBtn = document.querySelector('.search');
                searchBtn.addEventListener('click',function(){

                    const searchField = document.querySelector('#q');
                    const categoriesBtn = document.getElementById('category');
                    const categoryValue = categoriesBtn.options[categoriesBtn.selectedIndex].text;
                    const languagesBtn = document.getElementById('language');
                    const languageValue = languagesBtn.options[languagesBtn.selectedIndex].text;
                    if (searchField.value == ''){
                        searchField.disabled = true;
                    }
                    if (categoryValue == 'Categories'){
                        categoriesBtn.disabled = true;
                    }
                    if (languageValue == 'Languages'){
                        languagesBtn.disabled = true;
                    }

                });
            </script>

@endsection
