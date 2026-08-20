<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('/assets/img/logos/logo Bravo 2.png')}}" type="image/png"/>
    <meta property="og:image" content="{{asset('/assets/img/logos/logo Bravo 2.png')}}"/>
    <title>
        Register - BRAVO
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <meta name="description" content="BRAVO - Online Recruitment Platform" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .hidden{
            display: none;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{route('index')}}">
           <img class="logo-dark" style="height: 40px" src="{{asset('/assets/img/logos/logo Bravo.png')}}" alt="Bravo logo">
{{--            BRAVO--}}
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mx-auto">
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a href="{{route('index')}}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                        Home
                    </a>

{{--                <li class="nav-item dropdown dropdown-hover mx-2">--}}
{{--                    <a href="{{route('about')}}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">--}}
{{--                        About--}}

{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a href="{{route('about')}}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                        About Bravo
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a href="{{route('contact')}}" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                        Contact
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                    <a href="{{route('login')}}" class="btn btn-sm  bg-gradient-secondary  btn-round mb-0 me-1" >Log in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{asset('/assets/img/curved-images/curved14.jpg')}}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    <p class="text-lead text-white">Create account on BRAVO as a company or employee for free.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-lg-9 col-12 mx-auto">

                        <form id="form-register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card card-body mt-4">
                                <h6 class="mb-0">Register</h6>
                                <p class="text-sm mb-0">Create account now</p>

                                <hr class="horizontal dark my-3">

                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Name</label>
                                        <div class="input-group">
                                            <input id="name" name="name" class="form-control" type="text" placeholder="Name" autocomplete="off" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Surname</label>
                                        <div class="input-group">
                                            <input id="surname" name="surname" class="form-control" type="text" placeholder="Surname" autocomplete="off" value="{{old('surname')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label mt-4">About</label>
                                        <div class="input-group">
                                            <textarea id="about" name="about" class="form-control" rows="5">{{old('about')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Email</label>
                                        <div class="input-group">
                                            <input id="email" name="email" class="form-control" type="email" autocomplete="off" placeholder="Email" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Username</label>
                                        <div class="input-group">
                                            <input id="username" name="username" class="form-control" type="text" autocomplete="off" placeholder="Username" value="{{old('username')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Birthday</label>
                                        <div class="input-group">
                                            <input id="date" name="birthday" class="form-control" type="date" autocomplete="off" placeholder="Email" value="{{old('birthday')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Provice</label>
                                        <select class="form-select" name="province_id" aria-label="Default select example">
                                            <option value = "" selected>Choose Category</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Gender</label>
                                        <div class="input-group">
                                            <select class="form-select" name="gender" aria-label="Default select example">
                                                <option value = "" selected>Choose Gender</option>
                                                <option value = "1">Male</option>
                                                <option value = "2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">Phone number</label>
                                        <div class="input-group">
                                            <input id="phone_number" name="phone_number" class="form-control" type="phone_number" placeholder="Phone number" value="{{old('phone_number')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Password</label>
                                        <div class="input-group">
                                            <input id="password" name="password" class="form-control" type="password" placeholder="Password" value="{{old('password')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Password Confirmation</label>
                                        <div class="input-group">
                                            <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" placeholder="Password Confirmation" value="{{old('password_confirmation')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Certificate</label>
                                        <select class="form-select" name="certificate" aria-label="Default select example">
                                            <option value = "" selected>Choose Certificate</option>
                                            <option value = "Associate degree" {{ old('certificate') == 'Associate degree' ? 'selected' : ''}}>Associate degree</option>
                                            <option value = "Bachelor's degree" {{ old('certificate') == "Bachelor's degree" ? 'selected' : ''}}>Bachelor's degree</option>
                                            <option value = "Master's degree" {{ old('certificate') == "Master's degree" ? 'selected' : ''}}>Master's degree</option>
                                            <option value = "Doctoral degree" {{ old('certificate') == "Doctoral degree" ? 'selected' : ''}}>Doctoral degree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="user-row">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">CV</label>
                                        <div class="input-group">
                                            <input id="cv" name="cv" class="form-control" type="file" placeholder="Attach CV">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Category</label>
                                        <select class="form-select" name="category_id" aria-label="Default select example">
                                            <option value = "" selected>Choose Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="language-row">
                                    <div class = "row">
                                <div class="col-sm-6 col-12">
                                        <label class="form-label mt-4">*Language <span style="color:red; cursor:pointer" class="remove-language">(remove)</span></label>
                                        <select class="form-select" name="language_id[]" aria-label="Default select example">
                                            <option value = "" selected>Choose Language</option>
                                            @foreach($languages as $language)
                                                <option value="{{$language->id}}">{{$language->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">*Level of knowledge</label>
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
                                </div>
                                    <button type="button" class="btn btn-secondary add-language mt-2">+ Add</button>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-6 col-12">

                                        <div class="form-group">
                                            <label class="form-label">Choose if you are a company</label>

                                            <div class="form-check form-switch ms-1">
                                                <input type="hidden" name="is_business" value="0"/>
                                                <input class="form-check-input" type="checkbox" name="is_business" {{ old('is_business') == 1 ? 'checked' : ''}} value="0"  id="businessFlexSwitchCheckDefault" >
                                                <label class="form-check-label" for="remoteFlexSwitchCheckDefault">Company</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="company-details hidden">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label">*Name</label>
                                            <div class="input-group">
                                                <input id="business_name" name="business_name" class="form-control" autocomplete="off" type="text" placeholder="Business name" value="{{old('business_name')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label">Industry</label>
                                            <div class="input-group">
                                                <input id="industry" name="industry" class="form-control" autocomplete="off" type="text" placeholder="Industry" value="{{old('industry')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Capacity</label>
                                            <div class="input-group">
                                                <input id="capacity" name="capacity" class="form-control" autocomplete="off" type="text" placeholder="Capacity" value="{{old('capacity')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Address</label>
                                            <div class="input-group">
                                                <input id="address" name="address" class="form-control" autocomplete="off" type="text" placeholder="Address" value="{{old('address')}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Phone Number</label>
                                            <div class="input-group">
                                                <input id="tel" name="tel" class="form-control" type="text" autocomplete="off" placeholder="Mobile Number" value="{{old('tel')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label mt-4">Website</label>
                                            <div class="input-group">
                                                <input id="website" name="website" class="form-control" autocomplete="off" type="text" placeholder="Website" value="{{old('website')}}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <a href="{{route('login')}}" class="btn btn-light m-0">Cancel</a>
                                    <button id="createAccountBtn" type="submit" class="btn bg-gradient-dark m-0 ms-2">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>    </div>
        </div>
    </div>
</section>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
    <div class="container">

        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, BRAVO, All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<!--   Core JS Files   -->
<script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('/static/assets/plugins/jquery.min.js')}}"></script>
<script src="{{asset('/static/assets/plugins/plugins.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
{{-- <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script> --}}
<script src="{{asset('/assets/js/script.js')}}"></script>
<script src="{{asset('/js/form.js')}}"></script>
<script type="text/javascript">
    const companyDetails = document.querySelector('.company-details');
    const companyButton = document.querySelector('#businessFlexSwitchCheckDefault');
    const userRow = document.querySelector('.user-row');
    companyButton.addEventListener('click',function(){
        if (this.checked == true){
            companyDetails.classList.remove('hidden');
            this.value = 1;//per kompani
            userRow.classList.add('hidden');
        }
        else{
            this.value = 0;
            companyDetails.classList.add('hidden');
            userRow.classList.remove('hidden');
        }
    });
    if (companyButton.checked){
        companyDetails.classList.remove('hidden');
        this.value = 1;//per kompani
        userRow.classList.add('hidden');
    }
    else{
        companyDetails.classList.add('hidden');
        this.value = 0;//per kompani
        userRow.classList.remove('hidden');
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#form-register').on('submit', function (event) {
        event.preventDefault();
        let formData = new FormData(this)
        new clearValidate();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            dataType: "JSON",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'top-right',
                    afterHidden: () => {
                        window.location.reload()
                    },
                })
            },
            error: function(reject){
                if (reject.status == 422) {
                    let errors = $.parseJSON(reject.responseText).errors;
                    new setErrors(errors);
                }
            }
        });
    })
</script>
</body>

</html>
