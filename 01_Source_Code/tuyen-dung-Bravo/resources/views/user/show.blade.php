<?php
use App\Models\SucessfulUsers;
?>
@extends('layouts.index')
@section('title')
    <title>
        {{$user->name . " " .  $user->surname . ' - BRAVO'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{asset("/assets/img/curved-images/curved1.jpg")}}'); background-position-y: 50%;">
            <span class="mask bg-gradient-warning opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/images/{{$user->photo->name}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                           {{$user->name. " ". $user->surname}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                          {{$user->category->name}}
                        </p>
                    </div>
                </div>
    @if (auth()->user()->role->name=='administrator')
   <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
       <div class="nav-wrapper position-relative end-0">
           <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">


               <li class="nav-item">
                @if(!SucessfulUsers::where('user_id', $user->id)->exists())
                   <a class="nav-link mb-0 px-0 py-1 active " data-toggle="modal" data-target="#candidatesModal" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                       <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                               <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                   <g transform="translate(1716.000000, 291.000000)">
                                       <g transform="translate(603.000000, 0.000000)">
                                           <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                           </path>
                                           <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                           <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                                       </g>
                                   </g>
                               </g>
                           </g>
                       </svg>
                       <span class="ms-1">Mark successful candidate</span>
                   </a>
                @endif
               </li>

           </ul>
       </div>
   </div>
                @endif
</div>
</div>
</div>

</div>
</div>
</div>
<div class="container-fluid py-4">
<div class="row mt-3">
<div class="col-12 col-md-6 col-xl-4">
   <div class="card h-100">
       <div class="card-header pb-0 p-3">
           <div class="row">
               <div class="col-md-8 d-flex align-items-center">
                   <h6 class="mb-0">Profile Information</h6>
               </div>
               <div class="col-md-4 text-end">
                   <a href="{{route('user.edit')}}">
                       <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Change profile"></i>
                   </a>
               </div>
           </div>
       </div>
       <div class="card-body p-3">

           <hr class="horizontal gray-light my-1">
           <ul class="list-group">
               <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;{{$user->name. " " . $user->surname}}</li>
               <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> 
                    @if($user->email_verified_at != null)
                        <a style="color: green" href="mailto:{{$user->email}}"> {{$user->email}}</a>
                    @else
                        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                    @endif
                </li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Birthday:</strong> &nbsp;{{\Carbon\Carbon::parse($user->birthday)->format('Y-m-d')}}</li>
                <!-- <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Province:</strong> &nbsp;{{ $user->province->name }}</li> -->
                @if ($user->phone_number)
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Phone number:</strong> &nbsp;{{ $user->phone_number }}</li>
                @endif
                @if ($user->category)
                   <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Category:</strong> &nbsp;{{$user->category->name}}</li>@endif
                @if ($user->certificate)
                   <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Certificate:</strong> &nbsp;{{ $user->certificate }}</li>
                @endif
               @if ($user->cv)
                   <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">CV:</strong> &nbsp; <a href="/files/{{$user->cv}}"><img src="{{asset('/assets/img/pdf.webp')}}" style="width: 20px"></a> </li>@endif

               <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Languages:</strong> @foreach($user->language as $language)
                       {{$language->name}} - <b>{{$language->pivot->level}}</b> <br>
                   @endforeach</li>

               @if ($user->facebook || $user->linkedin)
               <li class="list-group-item border-0 ps-0 pb-0">
                   <strong class="text-dark text-sm">Social:</strong> &nbsp;
                   @if ($user->facebook)
                   <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="https://facebook.com/{{$user->facebook}}">
                       <i class="fab fa-facebook fa-lg"></i>
                   </a>
                   @endif
                   @if ($user->linkedin)
                   <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="https://www.linkedin.com/in/{{$user->linkedin}}">
                       <i class="fab fa-linkedin fa-lg"></i>
                   </a>
                   @endif

{{--                   <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">--}}
{{--                       <i class="fab fa-instagram fa-lg"></i>--}}
{{--                   </a>--}}

               </li>
               @endif



           </ul>
       </div>
   </div>
</div>
<div class="col-12 col-md-6 col-xl-8  mt-md-0 mt-4">
   <div class="card h-100">
       <div class="card-header pb-0 p-3">
           <h6 class="mb-0">Description</h6>
       </div>

       <div class="card-body p-3">
           @if ($user->about)
           <h6 class="text-uppercase text-body text-xs font-weight-bolder">About You</h6>
       <p class="text-sm">
           {{$user->about}}
       </p>
               @endif
       </div>
   </div>
</div>



</div>
    @if (auth()->user()->role->name=='administrator')
    <div class="modal fade" id="candidatesModal" tabindex="-1" role="dialog" aria-labelledby="candidatesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="candidatesModalLabel">Mark sucessful candidate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:none; outline: none; border:none">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form action="{{route('admin.sucessful.users.store',$user->slug)}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        Add Comment:
                        <textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif


@endsection
