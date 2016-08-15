@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Game Contents</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="input-group custom-search-form">
                        {!! Form::open(['method' => 'GET', 'route' =>  ['admin.game_contents.index'] ]) !!}
                        <span class="input-group-btn">
                            <input type="text" value="{{$searchContent}}" name="q" class="form-control" placeholder="Search content..">

                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        <input type="hidden" name="type" value="{{$searchType}}" />
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gameContents as $gameContent)
                                <tr>
                                    <td>{{$gameContent->id}}</td>
                                    <td>{{$gameContent->title}}</td>

                                    <td>
                                        @foreach (config('constants') as $key => $value)
                                            @if (strpos($key , 'GAME_CONTENT_TYPE') !== false && $value == $gameContent->type)
                                                {{  str_replace('_', ' ', str_replace('GAME_CONTENT_TYPE', '', $key)) }}
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>{!! str_limit($gameContent->desc, 200) !!}</td>
                                    <td><img src="{{url('img/cache/small/' . $gameContent->image)}}" /></td>
                                    <td>{{$gameContent->order}}</td>
                                    <td>
                                        <button id-attr="{{$gameContent->id}}" class="btn btn-primary btn-sm edit-post" type="button">Edit</button>&nbsp;
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.game_contents.destroy', $gameContent->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">{!!$gameContents->render()!!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary add-post" type="button">Add</button>
                        </div>
                    </div>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection
@section('footer')
    <script>
        $(function(){
            $('.add-post').click(function(){
                window.location.href = window.baseUrl + '/admin/game_contents/create';
            });
            $('.edit-post').click(function(){
                window.location.href = window.baseUrl + '/admin/game_contents/' + $(this).attr('id-attr') + '/edit';
            });
        });
    </script>
@endsection