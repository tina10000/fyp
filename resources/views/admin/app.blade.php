<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTM Staff Club</title>

    <!-- Bootstrap -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-single-rounded.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('resource/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link href="{{ asset('resource/css/font-awesome.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('resource/css/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('resource/css/daterangepicker.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('resource/css/custom.css') }}" rel="stylesheet">

    <!-- calender -->
    <link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.css' />

    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">




    <link rel="stylesheet" href="{{asset('css/frontend/css\weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/css\toast-notification.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/css\style.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/css\color.css')}}">

    @yield('css')




</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- side and top bar include -->
    @include('admin.includes.sideAndTopBarMenu')
    <!-- /side and top bar include -->
        @yield('content')
    <!-- footer content include -->
    @include('admin.includes.footer')
<!-- /footer content include -->
</div>
</div>
<!-- jQuery -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




<!-- Bootstrap -->
<script src="{{ asset('resource/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('resource/js/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('resource/js/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('resource/js/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('resource/js/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('resource/js/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('resource/js/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('resource/js/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('resource/js/jquery.flot.js') }}"></script>
<script src="{{ asset('resource/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('resource/js/jquery.flot.time.js') }}"></script>
<script src="{{ asset('resource/js/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('resource/js/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('resource/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('resource/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('resource/js/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('resource/js/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('/resource/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('resource/js/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('resource/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('resource/js/moment.min.js') }}"></script>
<script src="{{ asset('resource/js/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('resource/js/custom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/fullcalendar.js') }}"></script>



<!-- Datatables -->
<script src="{{ asset('resource/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('resource/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('resource/js/dataTables.buttons.min.js') }}"></script>


<script src="{{ asset('resource/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('resource/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('resource/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('resource/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('resource/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('resource/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('resource/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('resource/js/dataTables.scroller.min.js') }}"></script>

@stack('script')
</body>
</html>

