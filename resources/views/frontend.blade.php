<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tay thien ky</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600&subset=latin-ext,vietnamese" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link href="{{url('frontend/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/owl.theme.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('frontend/css/ekko-lightbox.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/max767.css')}}">
</head>

<body>
@include('frontend.header')
@yield('content')
@include('frontend.footer')
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{url('frontend/js/ekko-lightbox.min.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>
@yield('script')
</body>
</html>