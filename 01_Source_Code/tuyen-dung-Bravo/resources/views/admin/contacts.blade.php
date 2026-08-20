@extends('layouts.index')
@section('title')
    <title>
        {{ 'Contacts - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Contacts</h6>
                    </div>
                    @if(session('deleted_contact'))
                        <span style="color:red; margin-left: 25px;"> {{session('deleted_contact')}}</span>

                        @endif

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($contacts)>0)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Options</th>

                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)

                                        <tr>
                                            <td>

                                                <p class="text-xs font-weight-bold mb-0" style="margin-left: 20px">{{$contact->name}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$contact->email}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$contact->subject}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$contact->message}}</p>

                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{$contact->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <form action="{{route('admin.contacts.destroy',$contact->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                         <button type="submit" name="remove_contact" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Delete</button>
                                                    </form>
                                                </span>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            @else
                                <span style="color:red; margin-left: 25px;">Contacts not found.</span>
                            @endif
                            <div class="d-flex justify-content-center mt-3">
                                {{$contacts->links()}}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

@endsection
