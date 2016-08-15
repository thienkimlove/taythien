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
                            <li role="presentation" class="active"><a href="#tintuc" aria-controls="tintuc" role="tab" data-toggle="tab">{{$post->category->name}}</a></li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tintuc">
                                <div class="news-details">
                                    {!! $post->content !!}
                                </div>
                                @if (count($relatedPosts))
                                    <div class="news-related">
                                        <h2>
                                            Tin liên quan
                                        </h2>
                                        <div class="row">
                                            @foreach ($relatedPosts as $post)
                                                <div class="col-md-4 rs-item col-sm-4">
                                                    <div class="thumbnail">
                                                        <img src="{{url('img/cache/340x184', $post->image)}}" alt="{{$post->title}}">
                                                    </div>
                                                    <span class="date">
                                                         <i class="glyphicon glyphicon-time"></i>
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('d.m.Y')}}
                                                    </span>
                                                    <h3>{{$post->title}}</h3>
                                                    <p>{{$post->desc}}</p>
                                                    <a href="{{$post->slug.'.html'}}" class="ttk-more">
                                                        <i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection