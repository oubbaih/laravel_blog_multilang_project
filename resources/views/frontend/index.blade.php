<x-frontend-master>
    @section('header')
    <h1>{{$settings->title}}</h1>
    <span class="subheading">{{$settings->content}}</span>
    @endsection


    @section('post')
    @if ($posts)
    @foreach ($posts as $post)
    <h1></h1>
    <img src="{{asset($post->image)}}" alt="{{$post->title}}">
    <p>{!! $post->content !!}</p>
    <a href={{route('post.show' , $post->id)}}>read more</a>
    @endforeach
    @endif
    @endsection

</x-frontend-master>
