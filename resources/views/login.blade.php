
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>UTM Staff Portal</title>

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




<!--====== PRELOADER PART START ======-->

<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">


    <div id="home" class="header-hero bg_cover" style="background-image: url(visitors/assets/images/banner-bg.svg)">

            </div> <!-- row -->

        <div id="particles-1" class="particles"></div>

</header>


<!--====== BRAMD PART ENDS ======-->

<!--====== SERVICES PART START ======-->

<section id="features" class="services-area pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center pb-40">
                    <div class="line m-auto"></div>
                    <h3 class="title">login</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->


        <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                                <div class="card card-signin my-5">
                                    <div class="card-body">
                                        <div class="col-lg-12">

                                            <img src="{{ asset('assets/images/logo-rounded.png') }}" alt="logo" width="80%">
                                        </div>


                                        <br />
                                        <form method="post">
                                            @csrf
                                            <label>Enter Username</label>
                                            <input type="email" name="email" class="form-control" />
                                            <br />

                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <label>Enter Password</label>
                                            <input type="password" name="password" class="form-control" />
                                            <br />
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="submit" name="login" value="Login" class="btn btn-info" />
                                            <br />

                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <a href="{{ url('/callback') }}" class="btn btn-google"> Google</a>

                                                </div>
                                            </div>

                                            <p align="center"><a href="{{ url('register') }}">Register</a></p>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>


</section>

</body>

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




</body>

</html>
