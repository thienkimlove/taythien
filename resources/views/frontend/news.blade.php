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
            <a href="" class="giftcode" data-toggle="modal" data-target="#giftcode"></a>
        </div>
    </div>
    <div class="main articles">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-ttsk">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a id="tab_news" href="#tintuc" aria-controls="tintuc" role="tab" data-toggle="tab">Tin TỨc</a></li>
                            <li role="presentation"><a id="tab_guide" href="#guide" aria-controls="guide" role="tab" data-toggle="tab">Hướng dẫn</a></li>
                            <li role="presentation"><a id="tab_event" href="#sukien" aria-controls="sukien" role="tab" data-toggle="tab">Sự kiện</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tintuc">
                               @include('frontend.load_posts', ['posts' => $newsPosts])
                            </div>
                            <div role="tabpanel" class="tab-pane" id="guide">
                                @include('frontend.load_posts', ['posts' => $guidePosts])
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sukien">
                                @include('frontend.load_posts', ['posts' => $eventPosts])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function loadMoreData(page, tab) {
            $.ajax(
                    {
                        url: 'tin-tuc?page=' + page + '&type=' + tab,
                        type: "get"
                    })
                    .done(function (data) {
                        if (data.html == "") {
                            return;
                        }
                        if (tab == 'news') {
                            $('#tintuc').append(data.html);
                        } else if (tab == 'event') {
                            $('#sukien').append(data.html);
                        } else {
                            $('#guide').append(data.html);
                        }
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                       console.log('server not responding...');
                    });
        }

        $(document).ready(function(){
            var news_page = 1;
            var event_page = 1;
            var guide_page = 1;
            var tab = 'news';

            $('#tab_news').click(function(){
                tab = 'news';
            });

            $('#tab_event').click(function(){
                tab = 'event';
            });

            $('#tab_guide').click(function(){
                tab = 'guide';
            });

            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    if (tab == 'news') {
                        news_page ++;
                        loadMoreData(news_page, tab);
                    } else if (tab == 'event') {
                        event_page ++;
                        loadMoreData(event_page, tab);
                    } else {
                        guide_page ++;
                        loadMoreData(guide_page, tab);
                    }
                }
            });
        });
    </script>
@endsection