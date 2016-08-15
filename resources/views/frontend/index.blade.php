@extends('frontend')

@section('content')

    <div class="feature">
        <div class="img-large">
            <img src="{{url('frontend/images/sld1.jpg')}}" alt="First slide">
        </div>
        <div class="container">
            <div class="row">
                <img src="{{url('frontend/images/p12+.png')}}" alt="">
            </div>
        </div>
        <div class="ttk-download">
            <a href="{{$settings['link_napthe']}}" class="napthe"></a>
            <a href="{{$settings['link_taigame']}}" class="taigame"></a>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group ttk-dwdbar">
                        <a href="{{$settings['link_play_garena_plus']}}" class="list-group-item">
                            Chơi ngay trên
                            <span>GARENA PLUS</span>
                        </a>
                        <a href="{{$settings['link_play_appstore']}}" class="list-group-item">
                            Tải trên
                            <span>App store</span>
                        </a>
                        <a href="{{$settings['link_play_googleplay']}}" class="list-group-item">
                            Tải trên
                            <span>Google play</span>
                        </a>
                        <a href="{{$settings['link_play_apk']}}" class="list-group-item">
                            Tải file
                            <span>APK</span>
                        </a>
                        <div class="qrcode clearfix">
                            <img src="{{url('frontend/images/img-qrcode.png')}}" alt="">
                            <p><span>Quét mã QR </span>để tải game và chơi trên điện thoại di động</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-ttsk">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tintuc" aria-controls="tintuc" role="tab" data-toggle="tab">Tin TỨc</a></li>
                            <li role="presentation"><a href="#sukien" aria-controls="profile" role="tab" data-toggle="tab">Sự kiện</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tintuc">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        @if ($firstNewsPost = array_shift($indexNewsPosts))
                                        <div class="thumbnail">
                                            <a href="{{url($firstNewsPost->slug.'.html')}}"><img src="{{url('img/cache/555x401', $firstNewsPost->image)}}" alt="{{$firstNewsPost->title}}"></a>
                                            <div class="caption">
                                                <h3><a href="{{url($firstNewsPost->slug.'.html')}}">{{$firstNewsPost->title}}</a></h3>
                                                <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$firstNewsPost->updated_at)->format('d.m.Y')}}
                                                </span>
                                                <a href="{{url($firstNewsPost->slug.'.html')}}" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        @foreach ($indexNewsPosts as $post)
                                        <div class="thumbnail">
                                            <a href="{{$post->slug.'.html'}}"><img src="{{url('img/cache/262x190', $post->image)}}" alt="{{$post->title}}"></a>
                                            <div class="caption">
                                                <h3><a href="{{$post->slug.'.html'}}">{{$post->title}}</a></h3>
                                                <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('d.m.Y')}}
                                                </span>
                                                <a href="{{$post->slug.'.html'}}" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <a href="{{url('tin-tuc')}}" class="btn ttk-vall no-margin">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sukien">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        @if ($firstNewsPost = array_shift($indexNewsEvent))
                                            <div class="thumbnail">
                                                <a href="{{url($firstNewsPost->slug.'.html')}}"><img src="{{url('img/cache/555x401', $firstNewsPost->image)}}" alt="{{$firstNewsPost->title}}"></a>
                                                <div class="caption">
                                                    <h3><a href="{{url($firstNewsPost->slug.'.html')}}">{{$firstNewsPost->title}}</a></h3>
                                                    <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$firstNewsPost->updated_at)->format('d.m.Y')}}
                                                </span>
                                                    <a href="{{url($firstNewsPost->slug.'.html')}}" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        @foreach ($indexNewsEvent as $post)
                                            <div class="thumbnail">
                                                <a href="{{$post->slug.'.html'}}"><img src="{{url('img/cache/262x190', $post->image)}}" alt="{{$post->title}}"></a>
                                                <div class="caption">
                                                    <h3><a href="{{$post->slug.'.html'}}">{{$post->title}}</a></h3>
                                                    <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('d.m.Y')}}
                                                </span>
                                                    <a href="{{$post->slug.'.html'}}" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <a href="{{url('tin-tuc')}}" class="btn ttk-vall no-margin">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="trailer-artworks">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3>{{$trailer->title}}</h3>
                    <p>{{$trailer->desc}}</p>
                    <a class="btn ttk-btn-va" href="{{url('thu-vien')}}">Xem thêm</a>
                </div>
                <div class="col-md-7">
                    <div class="videopopup">
                        <img src="{{url('img/cache/652x401', $trailer->image)}}" alt="">
                        <span class="playable">
                                <a href="{{$trailer->video_url}}" data-toggle="lightbox">
                                    <i class="glyphicon glyphicon-play"></i>
                                </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 artworks">
                <h3>artworks</h3>
                <div id="owl-art" class="owl-carousel">
                    @foreach ($artWorkSliders as $slider)
                        <div class="item">
                            <img src="{{url('img/cache/360x195', $slider->image)}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('frontend.info')
@endsection