@extends('admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Game Contents</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            @if (!empty($game_content))
            <h2>Edit</h2>
            {!! Form::model($game_content, [
                'method' => 'PATCH',
                'route' => ['admin.game_contents.update', $game_content->id],
                'files' => true
             ]) !!}
            @else
                <h2>Add</h2>
                {!! Form::model($game_content = new App\GameContent, ['route' => ['admin.game_contents.store'], 'files' => true]) !!}
            @endif

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('type', 'Type') !!}
                {!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('desc', 'Short Description') !!}
                {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('addition_desc', 'Addition Description') !!}
                {!! Form::textarea('addition_desc', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Content') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                @if ($game_content->image)
                    <img src="{{url('img/cache/small/' . $game_content->image)}}" />
                    <hr>
                @endif
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('icon', 'Icon') !!}
                @if ($game_content->icon)
                    <img src="{{url('img/cache/77x77/' . $game_content->icon)}}" />
                    <hr>
                @endif
                {!! Form::file('icon', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('video_url', 'Video URL') !!}
                {!! Form::text('video_url', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('external_link', 'External Link') !!}
                {!! Form::text('external_link', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('order', 'Order') !!}
                {!! Form::select('order', $orders, null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            @include('admin.list')

        </div>
    </div>
@endsection