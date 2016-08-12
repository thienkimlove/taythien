@extends('frontend')

@section('content')

    <div class="feature feature-gioithieu">
        <div class="container">
            <div class="row">
                <img src="{{url('frontend/images/p12+.png')}}" alt="">
            </div>
        </div>
        <div class="ttk-download">
            <a href="{{$settings['link_napthe']}}" class="napthe"></a>
            <a href="{{$settings['link_taigame']}}" class="taigame"></a>
        </div>
        <div class="gt1">
            <div class="container">
                <h1>
                    WELCOME TO Tây thiên ký
                </h1>
                <p class="srt-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ullamcorper, diam vitae pharetra molestie, erat libero egestas nisi, vitae iaculis diam nisi vitae urna. In fermentum quam at tellus vestibulum semper. Sed at congue est, eu suscipit lacus.</p>
                <div class="row cottruyen">
                    <div class="col-md-4">
                        <h2>Cốt truyện</h2>
                        <p>Chơi Tây Thiên Ký, bạn không chỉ xem lại hay tiếp nối Tây Du Ký, mà còn thực sự sống lại quãng thời gian truyền kỳ đó, tự mình hướng dẫn Tôn Ngộ Không, Trư Bát Giới, Tiểu Bạch Long đi thỉnh kinh; vất vả đối chọi với Bạch Cốt Tinh, Thiên Binh, Thiên Tướng…</p>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <img src="{{url('frontend/images/img-char.png')}}" alt="">
                    </div>
                </div>
                <div class="row nhanvat">
                    <h2>Nhân vật</h2>
                    <p class="col-md-8 col-md-offset-2">Hóa thân thành một nhân vật để khám phá thế giới Tây Thiên Ký cổ xưa và huyền bí. Các nhân vật khác nhau có thể lựa chọn sư môn khác nhau để phát triển các kỹ năng phù hợp với tổ đội hoặc PK cá nhân.</p>
                    <div id="owl-chars" class="owl-carousel">
                        @foreach ($charSliders as $slider)
                           <div class="item">
                            <img src="{{url('img/cache/241x343', $slider->image)}}" alt="">
                            <div class="info">
                                <h3>{{$slider->title}}</h3>
                                <p>{{$slider->desc}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nhiemvu-tinhnang">
        <div class="container">
            <div class="row nv-list">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item">
                        <h2>Nhiệm vụ</h2>
                        <p>
                            Tây Thiên Ký có một hệ thống nhiệm vụ cực kỳ đồ sộ. Bên cạnh nhiệm vụ Cốt Truyện sẽ bám sát vào Cốt truyện Tây Du ký, các bạn còn có thể thỏa sức làm hàng loạt các nhiệm vụ lớn nhỏ như nhiệm vụ Tu Luyện, nhiệm vụ Sư Môn, Kho Báu, thi đấu Võ Đài.v.v.
                        </p>
                    </div>
                </div>
                @foreach ($missionList as $mission)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="hud">
                                <img src="{{url('img/cache/360x362', $mission->image)}}" alt="">
                                <h3>{{$mission->title}}</h3>
                            </div>
                            <div class="sub">
                                <div class="inner">
                                    <h3>{{$mission->title}}</h3>
                                    <p>{{$mission->desc}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row tinhnang tab-tn">
                <div class="col-md-7">
                    <div class="tab-content">
                        @foreach ($functionLists as $functionList)
                        <div role="tabpanel" class="tab-pane" id="function{{$functionList->order}}">
                            <a href="{{url('img/cache/680x537', $functionList->image)}}" data-toggle="lightbox">
                                <img src="{{url('img/cache/600x286', $functionList->image)}}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5">
                    <h2>Tính năng</h2>
                    <p class="txt-medi"> Tây Thiên Ký sở hữu nhiều tính năng đa dạng và độc đáo làm phong phú trải nghiệm của người chơi.</p>
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($functionLists as $functionList)
                        <li role="presentation" class="">
                            <a href="#function{{$functionList->order}}" aria-controls="function{{$functionList->order}}" role="tab" data-toggle="tab">
                                <span class="img-wrap"><img src="{{url('img/cache/86x148', $functionList->icon)}}" alt=""></span>
                                <span>{{$functionList->title}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="linhthu">
        <div class="container">
            <div class="row">
                <h2>Linh Thú</h2>
                <p class="txt-medi col-md-8 col-md-offset-2">Kho Linh Thú của Tây Thiên Ký cũng có số lượng cực kỳ phong phú. Điểm đặc biệt không chỉ nằm ở loại Linh Thú mà còn ở các kỹ năng mà Linh Thú đó sở hữu. Nếu bạn may mắn, một Linh Thú Biến Dị với những kỹ năng bá đạo sẽ là nguồn trợ lực cực lớn cho bạn.</p>
                <div id="sdr-linhthu" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner" role="listbox">

                        @foreach ($petSliders as $k => $petSlider)
                        <div class="{{($k == 0) ? 'item active' : 'item'}}">
                            <div class="img-holder col-md-3  col-sm-3 col-sm-offset-2 col-md-offset-2">
                                <img src="{{url('img/cache/267x267', $petSlider->image)}}" alt="">
                            </div>
                            <div class="img-des col-md-5 col-sm-7">
                                <p>
                                    Tên gọi: <span>{{$petSlider->title}}</span>
                                </p>
                                <p>
                                    Mô tả: <span>{{$petSlider->desc}}</span>
                                </p>
                                <p>
                                    Cách nhận:
                                    <span>{{$petSlider->addition_desc}}</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#sdr-linhthu" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#sdr-linhthu" role="button" data-slide="next">
                        <span class="glyphicon glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="sumon-donghanh">
        <div class="container">
            <div class="row sumon">
                <h2>Sư môn</h2>
                <p class="txt-medi col-md-10 col-md-offset-1">Trong Tây Thiên Ký tồn tại Cửu Đại Môn Phái với hệ thống kỹ năng phong phú để giúp các bạn thêm nhiều lựa chọn để khởi đầu. Mỗi loại môn phái lại có những đặc trưng riêng.</p>
                <div class="tab-sm">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs col-md-3 col-sm-5 col-md-offset-2" role="tablist">
                        @foreach ($skillList as $skill)
                        <li role="presentation">
                            <a href="#sm{{$skill->order}}" aria-controls="sm{{$skill->order}}" role="tab" data-toggle="tab">
                                <img src="{{url('img/cache/77x77', $skill->image)}}" alt="">
                            </a>
                        </li>
                         @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content col-md-6 col-sm-7">
                        @foreach ($skillList as $skill)
                        <div role="tabpanel" class="tab-pane active" id="sm{{$skill->order}}">
                            <h4>{{$skill->title}}</h4>
                            <p>{{$skill->desc}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="row donghanh">
                <h2>Đồng hành</h2>
                <p class="txt-medi col-md-10 col-md-offset-1">
                    Hệ thống Đồng Hành là một hệ thống đặc biệt, giúp bạn có thêm người trợ giúp khi hành tẩu giang hồ. Đồng hành không bị giới hạn sư môn nên bạn có thể điều khiển tối đa đến 5 sư môn khác nhau tùy mục đích sử dụng và chiến thuật mà bạn ưa thích.
                </p>
                <div id="owl-donghanh" class="owl-carousel2">

                    @foreach ($togetherSliders as $togetherSlider)
                        <div class="item">
                            <div class="imgs-holder">
                                <img src="{{url('img/cache/172x172', $togetherSlider->image)}}" alt="" class="img-circle">
                                <span>
                                    <img src="{{url('img/cache/172x172', $togetherSlider->image)}}" alt="" class="img-circle">
                                </span>
                            </div>
                            <div class="info">
                                <h3>{{$togetherSlider->title}}</h3>
                                <p>{{$togetherSlider->desc}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection