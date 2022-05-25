<x-frontend-master>
    @section('header')
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <img src="{{asset($post->image)}}" class="img-fluid" alt="{{$post->title}}">
                        <span class="meta">
                            Posted by
                            <a href="#!"> {{$post->user->name}}</a>
                            {{$post->created_at->diffForHumans()}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
     @endsection   
    <!-- Post Content-->
    @section('post')
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            {!! $post->content !!}
        </div>
    </article>

    @endsection
</x-frontend-master>
