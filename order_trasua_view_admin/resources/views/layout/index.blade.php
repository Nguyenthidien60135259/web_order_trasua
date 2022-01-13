<!DOCTYPE html>
<html lang="en">

<head>
    <title>LeoTea</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="stylesheet" href="resource/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/animate.css">

    <link rel="stylesheet" href="resource/css/owl.carousel.min.css">
    <link rel="stylesheet" href="resource/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="resource/css/magnific-popup.css">

    <link rel="stylesheet" href="resource/css/aos.css">

    <link rel="stylesheet" href="resource/css/ionicons.min.css">

    <link rel="stylesheet" href="resource/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="resource/css/jquery.timepicker.css">


    <link rel="stylesheet" href="resource/css/flaticon.css">
    <link rel="stylesheet" href="resource/css/icomoon.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

@include('layout.header')
@yield('content')
@include('layout.footer')

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>

@yield('scripts')
<script src="resource/js/jquery.min.js"></script>
<script src="resource/js/jquery-migrate-3.0.1.min.js"></script>
<script src="resource/js/popper.min.js"></script>
<script src="resource/js/bootstrap.min.js"></script>
<script src="resource/js/jquery.easing.1.3.js"></script>
<script src="resource/js/jquery.waypoints.min.js"></script>
<script src="resource/js/jquery.stellar.min.js"></script>
<script src="resource/js/owl.carousel.min.js"></script>
<script src="resource/js/jquery.magnific-popup.min.js"></script>
<script src="resource/js/aos.js"></script>
<script src="resource/js/jquery.animateNumber.min.js"></script>
<script src="resource/js/bootstrap-datepicker.js"></script>
<script src="resource/js/jquery.timepicker.min.js"></script>
<script src="resource/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="resource/js/google-map.js"></script>
<script src="resource/js/main.js"></script>

</body>

</html>