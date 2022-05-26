<x-frontend-master>
    <!-- Post Content-->
    @section('header')
    <h1>{{$post->title}}</h1>
    @endsection
    @section('post')
    <article class="mb-4">
        <img src="{{asset($post->image)}}" class="img-fluid" alt="{{$post->title}}">
        <span class="meta">
            Posted by
            <a href="#!"> {{$post->user->name}}</a>
            {{$post->created_at->diffForHumans()}}
        </span>
        <div class="container px-4 px-lg-5">
            {!! $post->content !!}
        </div>
    </article>

    @endsection
</x-frontend-master>
