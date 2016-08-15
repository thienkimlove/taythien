<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand hidden-lg hidden-md" href="/">
            <img src="{{url('frontend/images/ttk.png')}}" alt="">
        </a>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ttk-mainmenu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="ttk-mainmenu">
            <ul class="nav navbar-nav">
                <li class="{{($page == 'index') ? 'active' : ''}}">
                    <a href="{{url('/')}}" title="">Trang chủ</a>
                </li>
                <li class="{{($page == 'gioi-thieu') ? 'active' : ''}}">
                    <a href="{{url('gioi-thieu')}}">Giới thiệu</a>
                </li>
                <li class="{{($page == 'tan-thu') ? 'active' : ''}}">
                    <a href="{{url('tan-thu')}}">Tân thủ</a>
                </li>
                <a class="navbar-brand hidden-sm hidden-xs" href="/">
                    <img src="{{url('frontend/images/ttk.png')}}" alt="">
                </a>
                <li class="{{($page == 'tin-tuc') ? 'active' : ''}}"><a href="{{url('tin-tuc')}}">Tin tức</a></li>
                <li class="{{($page == 'thu-vien') ? 'active' : ''}}"><a href="{{url('thu-vien')}}">Thư viện</a></li>
                <li><a href="http://hotro.garena.vn/" target="_blank">Hỗ trợ</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

