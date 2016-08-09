@extends('frontend')

@section('content')

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group ttk-dwdbar">
                        <a href="#" class="list-group-item">
                            Chơi ngay trên
                            <span>GARENA PLUS</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tải trên
                            <span>App store</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tải trên
                            <span>Google play</span>
                        </a>
                        <a href="#" class="list-group-item">
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
                                        <div class="thumbnail">
                                            <a href="tintuc-chitiet.html"><img src="{{url('frontend/images/img-lamnhiemvutt.jpg')}}" alt="Tin tuc 1"></a>
                                            <div class="caption">
                                                <h3><a href="tintuc-chitiet.html">Mở khoá tính năng mới</a></h3>
                                                <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    12.04.2016
                                                </span>
                                                <a href="tintuc-chitiet.html" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="thumbnail">
                                            <a href="tintuc-chitiet.html"><img src="{{url('frontend/images/img-lamnhiemvutt.jpg')}}" alt="Tin tuc 1"></a>
                                            <div class="caption">
                                                <h3><a href="tintuc-chitiet.html">Mở khoá tính năng mới</a></h3>
                                                <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    12.04.2016
                                                </span>
                                                <a href="tintuc-chitiet.html" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                            </div>
                                        </div>
                                        <div class="thumbnail">
                                            <a href="tintuc-chitiet.html"><img src="{{url('frontend/images/img-lamnhiemvutt.jpg')}}" alt="Tin tuc 1"></a>
                                            <div class="caption">
                                                <h3><a href="tintuc-chitiet.html">Mở khoá tính năng mới</a></h3>
                                                <span class="date">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    12.04.2016
                                                </span>
                                                <a href="tintuc-chitiet.html" class="ttk-more pull-right"><i class="glyphicon glyphicon-arrow-right"></i>Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <a href="{{url('tin-tuc')}}" class="btn ttk-vall no-margin">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sukien">
                                Su kien
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
                    <h3>Trailer</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis libero quis odio efficitur maximus. Cras interdum nibh eget massa sagittis suscipit. Suspendisse sed massa nec leo aliquam accumsan non et velit.</p>
                    <a class="btn ttk-btn-va" href="{{url('thu-vien')}}">Xem thêm</a>
                </div>
                <div class="col-md-7">
                    <div class="videopopup">
                        <img src="{{url('frontend/images/img-video.jpg')}}" alt="">
                        <span class="playable">
                                <a href="http://www.youtube.com/watch?v=k6mFF3VmVAs" data-toggle="lightbox">
                                <i class="glyphicon glyphicon-play"></i>
                        </a>
                            </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 artworks">
                <h3>artworks</h3>
                <div id="owl-art" class="owl-carousel">
                    <div class="item">
                        <img src="{{url('frontend/images/img-a3.jpg')}}" alt="">
                    </div>
                    <!-- Slide cuoi cung -->
                    <div class="item">
                        <img src="{{url('frontend/images/img-a3.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{url('frontend/images/img-a2.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{url('frontend/images/img-a3.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{url('frontend/images/img-a1.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{url('frontend/images/img-a2.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{url('frontend/images/img-a3.jpg')}}" alt="">
                    </div>
                    <!-- Slide dau tien -->
                    <div class="item">
                        <img src="{{url('frontend/images/img-a1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ttk-info">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6 ttk-wk">
                    <div class="content">
                        <h4>WIKI</h4>
                        <p>Lorem ipsum dolor sit amet, <span>conseing elit.</span></p>
                        <a href="" class="btn ttk-vall">
                            Tìm hiểu
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-6 ttk-fbs col-md-offset-2">
                    <div class="content">
                        <h4>Facebook</h4>
                        <p>Cùng bạn bè chia sẻ về <span>TÂY THIÊN KÝ</span></p>
                        <a href="" class="btn ttk-vall">
                            Chia sẻ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection