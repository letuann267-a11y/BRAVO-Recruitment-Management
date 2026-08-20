<div class="card card-body" id="profile">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-auto col-4">
            <div class="avatar avatar-xl position-relative">

                <img src="/images/{{$user->photo->name}}" alt="{{$user->name . " ". $user->surname}}"class="w-100 border-radius-lg shadow-sm">


            </div>
        </div>
        <div class="col-sm-auto col-8 my-auto">
            <div class="h-100">
                <h5 class="mb-1 font-weight-bolder">
                    @if (auth()->user()->role->name=='administrator' || auth()->user()->role->name=='user')
                        {{$user->name. " ". $user->surname}}
                    @else
                        {{$user->company->name}}
                    @endif

                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    @if (auth()->user()->role->name=='administrator' || auth()->user()->role->name=='user') {{$user->category->name}} @else {{$user->company->industry}}  @endif
                </p>
            </div>
        </div>
        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
{{--            <label class="form-check-label mb-0">--}}
{{--                <small id="profileVisibility">--}}
{{--                    Switch to invisible--}}
{{--                </small>--}}
{{--            </label>--}}
{{--            <div class="form-check form-switch ms-2">--}}
{{--                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">--}}
{{--            </div>--}}
        </div>
    </div>
</div>
@section('scripts')
    <script>
        document.getElementById("file").onchange = function() {
            document.getElementById("input-form").submit();
        };
    </script>
@endsection
