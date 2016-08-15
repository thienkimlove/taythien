@extends('frontend')

@section('content')
    <div class="feature">
        <div class="ttkpage-header">
            <img src="{{url('frontend/images/img-tv.jpg')}}" alt="">
            <div class="container">
                <div class="row">
                    <h2>Thư viện</h2>
                    <p>Khám phá tài nguyên phong phú của Tây Thiên Ký</p>
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
    <div class="main thuvien">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-ttsk tab-lib">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#anhnen" aria-controls="anhnen" role="tab" data-toggle="tab">Ảnh nền</a></li>
                            <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>
                            <li role="presentation"><a href="#screenshots" aria-controls="screenshots" role="tab" data-toggle="tab">Screenshots</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="anhnen">
                                @foreach ($backgroundImages->chunk(2) as $backgroundImage)
                                  <div class="row">
                                    @foreach ($backgroundImage as $post)
                                      <div class="col-md-6 col-sm-6">
                                        <div class="item">
                                            <a href="{{url('img/cache/555x359', $post->image)}}" data-toggle="lightbox" data-gallery="anhnenglr">
                                                <span>{{$post->title}}</span>
                                            </a>
                                            <div class="ctn">
                                                <img src="{{url('img/cache/555x359', $post->image)}}" alt="">

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <div role="tabpanel" class="tab-pane" id="videos">
                                @foreach ($videos->chunk(2) as $video)
                                    <div class="row">
                                        @foreach ($video as $post)
                                            <div class="col-md-6 col-sm-6">
                                                <div class="item">
                                                    <a href="{{url('img/cache/555x359', $post->image)}}" data-toggle="lightbox" data-gallery="anhnenglr">
                                                        <span>{{$post->title}}</span>
                                                    </a>
                                                    <div class="ctn">
                                                        <img src="{{url('img/cache/555x359', $post->image)}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div role="tabpanel" class="tab-pane" id="screenshots">
                                @foreach ($screenshots->chunk(2) as $images)
                                    <div class="row">
                                        @foreach ($images as $image)
                                            <div class="col-md-6 col-sm-6">
                                                <div class="item">
                                                    <a href="{{url('img/cache/555x359', $image->image)}}" data-toggle="lightbox" data-gallery="anhnenglr">
                                                        <span>{{$image->title}}</span>
                                                    </a>
                                                    <div class="ctn">
                                                        <img src="{{url('img/cache/555x359', $image->image)}}" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
