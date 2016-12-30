<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('frontend.meta')
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600&subset=latin-ext,vietnamese" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link href="{{url('frontend/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/owl.theme.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('frontend/css/ekko-lightbox.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/max767.css')}}">
    <link type="image/x-icon" href="{{url('frontend/images/favicon.ico')}}" rel="shortcut icon" />
</head>

<body>
<div id="fb-root"></div>
<script type='text/javascript'>
    window.fbAsyncInit = function() {
        FB.init({
            status: true,
            cookie: true,
            xfbml: true,
            oauth: true
        });
        FB.Event.subscribe('edge.create', function(response) {
              if ( response == 'https://www.facebook.com/ttkgarena/') {
                  $.get('ajax', function(res){
                      $('#gift_store').text(res.msg);
                      $('#gcode').show();
                  });
              }
        });
    };
    (function(d) {
        var js, id = 'facebook-jssdk';
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement('script');
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
</script>
@include('frontend.header')
@yield('content')
@include('frontend.footer')
<div class="modal fade modal-giftcode" id="giftcode" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{url('frontend/images/i-close.png')}}" alt="">
                </button>
                <h4 class="modal-title">GIFTCODE TÂN THỦ</h4>
            </div>
            <div class="modal-body">
                    <div class="fb-like" data-href="https://www.facebook.com/ttkgarena/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>

                <div class="gcode" id="gcode" style="display: none">
                    GIFTCODE của bạn:
                    <span id="gift_store"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{url('frontend/js/ekko-lightbox.min.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-61673473-16', 'auto');
    ga('send', 'pageview');

</script>
@yield('script')
</body>
</html>