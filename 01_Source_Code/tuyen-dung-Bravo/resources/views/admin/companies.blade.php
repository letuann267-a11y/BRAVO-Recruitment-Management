@extends('layouts.index')
@section('title')
    <title>
        {{ 'Companies - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form action="{{route('admin.search.companies')}}" method="GET">
            <div class="row g-0">
                <div class="col-6">
                    <input id="s" name="q" class="form-control" type="text" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px" placeholder="Search companies" autocomplete="off">
                </div>

                <div class="col-6"><button type="submit" class="btn btn-dark" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">Search</button></div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Companies</h6>
                    </div>
                    <div class="card-header">                  
                        @if (session('deleted_user'))
                            <span style="color:red!important">{{session('deleted_user')}}</span>
                        @endif
                        @if (session('approved_company'))
                            <span style="color:green!important">{{session('approved_company')}}</span>
                        @endif
                    </div>
                    @if (session('min_length_input'))
                        <span style="color:red">{{session('min_length_input')}}</span>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($users)>0)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Industry</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacity</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile Number</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="{{route('company.show',$user->slug)}}">
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="/images/{{optional($user->photo)->name}}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{optional($user->company)->name ?? '/'}}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <p class="text-xs  font-weight-bold mb-0">{{optional($user->company)->industry ?: "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{optional($user->company)->capacity ?: "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{optional($user->company)->address ?: "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{optional($user->company)->tel ?: "/"}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0" style="color: {{$user->is_approved ? 'green' : 'red'}}">
                                                    {{$user->is_approved ? 'Approved' : 'Pending'}}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    @if (!$user->is_approved)
                                                        <form action="{{route('admin.company.approve',$user->slug)}}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-link" style="text-decoration: none; color:green!important; padding: 0; margin:0!important;text-transform: none;" type="submit">Approve</button>
                                                        </form>
                                                    @endif
                                                    <button class="btn btn-link delete-user-company-btn" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" type="button" data-toggle="modal" data-target="#confirmDeleteModal{{$user->id}}">Delete</button>
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
                    Are you sure want to delete this Company?
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
