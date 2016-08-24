@foreach ($posts as $post)
    <div class="row item">
        <div class="col-md-5 col-sm-5">
            <div class="thumbnail">
                <a href="{{url($post->slug.'.html')}}">
                    <img src="{{url('img/cache/460x249', $post->image)}}" alt="{{$post->title}}">
                </a>
            </div>
        </div>
        <div class="col-md-7 col-sm-7">
             <span class="date">
               <i class="glyphicon glyphicon-time"></i>
                  {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('d.m.Y')}}
              </span>
            <h3><a href="{{url($post->slug.'.html')}}">{{$post->title}}</a></h3>
            <p>{{$post->desc}}</p>
            <a href="{{url($post->slug.'.html')}}" class="ttk-more">
                <i class="glyphicon glyphicon-arrow-right"></i>Xem thêm
            </a>
        </div>
    </div>
@endforeach