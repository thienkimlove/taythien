<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand">Admin v2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a><i class="fa fa-files-o fa-fw"></i>Post<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/posts?category_id='.config('constants.NEWS_CATEGORY_ID'))}}">Tin tức</a>
                        </li>
                        <li>
                            <a href="{{url('admin/posts?category_id='.config('constants.GUIDE_CATEGORY_ID'))}}">Hướng dẫn</a>
                        </li>
                        <li>
                            <a href="{{url('admin/posts?category_id='.config('constants.EVENT_CATEGORY_ID'))}}">Sự kiện</a>
                        </li>

                        <li>
                            <a href="{{url('admin/posts/create')}}">Add</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="{{url('admin/settings')}}"><i class="fa fa-files-o fa-fw"></i>Settings<span class="fa arrow"></span></a>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a><i class="fa fa-files-o fa-fw"></i>Game Contents<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        @foreach (config('constants') as $key => $config)
                            @if (strpos($key, 'GAME_CONTENT_TYPE') !== false)
                                <li>
                                    <a href="{{url('admin/game_contents?type='.$config)}}">{{  str_replace('_', ' ', str_replace('GAME_CONTENT_TYPE', '', $key)) }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>