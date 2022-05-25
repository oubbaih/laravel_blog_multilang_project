<x-frontend-master>
    @section('header')
          <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{$settings->title}}</h1>
                        <span class="subheading">{{$settings->content}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('post')
         @foreach ($posts as $post)
                   <div class="post-preview">
                    <a href="{{route('post.show' , $post->id)}}">
                        <h2 class="post-title">{{$post->title}}</h2>
                        <h3 class="post-subtitle">{!! $post->content !!}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{$post->user->name}}</a>
                        {{$post->created_at->diffForHumans()}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" /> 
                @endforeach
    @endsection
</x-frontend-master>