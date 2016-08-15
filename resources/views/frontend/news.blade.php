@extends('frontend')

@section('content')

    <div class="feature">
        <div class="ttkpage-header">
            <img src="{{url('frontend/images/img-tt.jpg')}}" alt="">
            <div class="container">
                <div class="row">
                    <h2>Tin tức</h2>
                    <p>Cập nhật những thông tin mới nhất về Tây Thiên Ký</p>
                </div>
            </div>
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
    <div class="main articles">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-ttsk">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tintuc" aria-controls="tintuc" role="tab" data-toggle="tab">Tin TỨc</a></li>
                            <li role="presentation"><a href="#sukien" aria-controls="sukien" role="tab" data-toggle="tab">Sự kiện</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tintuc">

                                @foreach ($newsPosts as $post)
                                <div class="row item">
                                    <div class="col-md-5 col-sm-5">
                                        <div class="thumbnail">
                                            <a href="{{url($post->slug.'.html')}}"><img src="{{url('img/cache/460x249', $post->image)}}" alt="{{$post->title}}"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                            <span class="date">
                                                            <i class="glyphicon glyphicon-time"></i>
                                                            {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('d.m.Y')}}
                                                        </span>
                                        <h3><a href="{{url($post->slug.'.html')}}">{{$post->title}}</a></h3>
                                        <p>{{$post->desc}}</p>
                                        <a href="{{url($post->slug.'.html')}}" class="ttk-more"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">
                                    <a href="#" class="btn ttk-vall">Xem thêm</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sukien">

                                @foreach ($eventPosts as $post)
                                    <div class="row item">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="thumbnail">
                                                <a href="{{url($post->slug.'.html')}}"><img src="{{url('img/cache/460x249', $post->image)}}" alt="{{$post->title}}"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <span class="date">
                                                            <i class="glyphicon glyphicon-time"></i>
                                                {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('d.m.Y')}}
                                                        </span>
                                            <h3><a href="{{url($post->slug.'.html')}}">{{$post->title}}</a></h3>
                                            <p>{{$post->desc}}</p>
                                            <a href="{{url($post->slug.'.html')}}" class="ttk-more"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="row">
                                    <a href="#" class="btn ttk-vall">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection