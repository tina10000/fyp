<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>UTM Staff Club</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-single-rounded.png') }}" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-4.5.0.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

<style>
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }
    .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
    }

    .form-signin {
        width: 100%;
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group input {
        height: auto;
        border-radius: 2rem;
    }

    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }

    .btn-google {
        color: white;
        background-color: #ea4335;
    }

    .btn-facebook {
        color: white;
        background-color: #3b5998;
    }

    /* Fallback for Edge
    -------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
        .form-label-group>label {
            display: none;
        }
        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }

    /* Fallback for IE
    -------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
        .form-label-group>label {
            display: none;
        }
        .form-label-group input:-ms-input-placeholder {
            color: #777;
        }
    }
</style>

<!--====== PRELOADER PART START ======-->



<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
    <div class="navbar-area">

    </div> <!-- navbar area -->


</header>


<section id="features" class="services-area pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center pb-40">
                    <img src="{{ asset('assets/images/logo-rounded.png') }}" alt="logo" width="30%">
                    <div class="line m-auto">

                    </div>
                    <h3 class="title">Registration</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->


        <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>



            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">


                                <form method="post" class="form-signin" >
                                    @csrf
                                    <div class="form-label-group">
                                        <input name="first_name" type="text" id="inputFName" class="form-control" placeholder="First Name" >
                                        <label for="inputFName">First Name</label>
                                    </div>
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-label-group">
                                        <input name="last_name" type="text" id="inputLName" class="form-control" placeholder="Last Name" >
                                        <label for="inputLName">Last Name</label>
                                    </div>
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <div class="form-label-group">
                                        <input name="name" type="text" id="inputUName" class="form-control" placeholder="User Name" >
                                        <label for="inputUName">Username</label>
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-label-group">
                                        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email Address" >
                                        <label for="inputEmail">Email </label>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-label-group">
                                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" >
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


{{--                                    <!-- Type -->--}}
{{--                                    <div class="item form-group">--}}
{{--                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Type <span class="required">*</span>--}}
{{--                                        </label>--}}
{{--                                        <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                                            <select id="type" name="user_type"  class="form-control">--}}
{{--                                                <option value="">Select Title</option>--}}
{{--                                                @foreach($types as $type)--}}
{{--                                                    <option value="{{ $type->id }}">{{ $type->type }}</option>--}}
{{--                                                @endforeach--}}

{{--                                            </select>--}}


{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                        </div>--}}

{{--                                        @error('user_type')--}}
{{--                                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}


                                    <br>
                                    <br>


                                    <button class="btn btn-lg btn-primary btn-block text-uppercase"  type="submit" >Register</button>
                                </form>
                                <a href="{{ url('login') }}" class="mt-5 mb-3 text-muted">Go back to login page</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

</div>

</section>




<!--====== FOOTER PART START ======-->



<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->

<!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

<!--====== PART ENDS ======-->




<!--====== Jquery js ======-->


</body>

</html>
