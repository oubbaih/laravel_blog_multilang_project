<x-frontend-master>
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