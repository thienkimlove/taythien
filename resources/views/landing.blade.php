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

<body class="teaser-page">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=267176570151931";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ttk-head clearfix">
                    <div class="icon18">
                        <img src="{{url('frontend/images/p12+.png')}}" alt="">
                    </div>
                    <div class="h1 gametitle">
                        <a href="javascript:void(0)"><img src="{{url('frontend/images/ttk.png')}}" alt=""></a>
                    </div>
                </div>
                <h2 class="pagetitle">
                    Hồi sinh dòng game theo lượt!
                    <span>tổ đội pk, chat thoại thả ga!</span>
                </h2>
                <div class="tab tab-tsr-video">

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="ttk-teaser">
                            <a href="https://www.youtube.com/watch?v=keFptRNUmVA" data-toggle="lightbox">
                                <img src="{{url('frontend/images/tsr-teaser.jpg')}}" alt="">
                            </a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="ttk-trailer">
                            <a href="https://www.youtube.com/watch?v=keFptRNUmVA" data-toggle="lightbox">
                                <img src="{{url('frontend/images/tsr-trailer.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                   {{-- <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#ttk-teaser" aria-controls="ttk-teaser"  role="tab" data-toggle="tab">Viral</a></li>
                        --}}{{--<li role="presentation"><a href="#ttk-trailer" aria-controls="ttk-trailer" role="tab" data-toggle="tab">Trailer</a></li>--}}{{--
                    </ul>--}}
                </div>
                <div id="owl-art" class="owl-carousel">
                    @foreach ($artWorkSliders as $slider)
                        <div class="item">
                            <img src="{{url('img/cache/360x195', $slider->image)}}" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="tsr-download">
                    <div class="list-group ttk-dwdbar">

                       {{-- <a href="{{$settings['link_play_appstore']}}" class="list-group-item ap">--}}
                        <a href="{{$settings['link_play_appstore']}}" class="list-group-item ap">
                            Tải trên
                            <span>App store</span>
                        </a>
                        {{--<a href="{{$settings['link_play_googleplay']}}" class="list-group-item gp">--}}
                        <a href="{{$settings['link_play_googleplay']}}" class="list-group-item gp">
                            Tải trên
                            <span>Google play</span>
                        </a>
                       {{-- <a href="{{$settings['link_play_garena_plus']}}" class="list-group-item glg">--}}
                        <a href="{{$settings['link_play_garena_plus']}}" class="list-group-item glg">
                            Chơi trên
                            <span>Giả lập G+</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ttk-fs">
                <a href="{{$settings['link_facebook']}}" class="ttk-fanpagelink">
                    <img src="{{url('frontend/images/img-fanpage.png')}}" alt="">
                </a>

                <a href="{{url('/')}}" class="" style="
                        padding: 1px 12px 3px;
                        background: #e31e25;
                        color: #fff;
                        border-radius: 5px;
                        font-size: 16px;
                        text-shadow: 1px 0 1px rgba(0,0,0,.5);
                        text-decoration: none;
                        top: -3px;
                        display: inline-block;
                        position: relative;
                    ">
                    Trang chủ
                </a>

            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-3">
                <img src="{{url('frontend/images/garena.png')}}" alt="">
            </div>
            <div class="col-md-6  col-sm-7 col-xs-5">
                <p>
                    © Garena Online. Trademarks belong to their respective owners.
                    <br> All rights reserved.
                </p>
            </div>
            <div class="col-md-3  col-sm-2 col-xs-3">
                <img src="{{url('frontend/images/ttk-lg.png')}}" alt="" class="pull-right">
            </div>
            <div class="col-md-1  col-sm-1 col-xs-1">
                <img src="{{url('frontend/images/p12+.png')}}" alt="" class="pull-right">
            </div>
        </div>
    </div>
</footer>
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
</body>

</html>
