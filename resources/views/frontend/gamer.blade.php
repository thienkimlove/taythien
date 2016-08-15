@extends('frontend')

@section('content')
    <div class="feature">
        <div class="ttkpage-header">
            <img src="{{url('frontend/images/img-tanthu.jpg')}}" alt="">
            <div class="container">
                <div class="row">
                    <h2>Tân thủ</h2>
                    <p>Tìm hiểu những hướng dẫn cho người chơi mới</p>
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
    <div class="main tanthu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-ttsk tab-tanthu">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($gamers as $key => $gamer)
                            <li role="presentation" class="{{ ($key == 0) ? 'active' : '' }}"><a href="#tab{{$key}}" aria-controls="tab{{$key}}" role="tab" data-toggle="tab">{{$gamer->title}}</a></li>
                            @endforeach
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach ($gamers as $key => $gamer)
                            <div role="tabpanel" class="{{ ($key == 0) ? 'tab-pane active' : 'tab-pane' }}" id="tab{{$key}}">
                                {!! $gamer->content !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.info')
@endsection
