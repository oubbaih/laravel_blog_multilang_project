<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>

<body>
    <h1>{{__('word.home')}}</h1>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
            aria-expanded="false">Languages</a>
        <div class="dropdown-menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
            @endforeach
        </div>
    </li>


    @if ($posts)
        @foreach ($posts as $post)
            <h1>{{$post->title}}</h1>
            <img src="{{asset($post->image)}}" alt="{{$post->title}}">
            <p>{!! $post->content !!}</p>
        @endforeach
        <img src="{{}}" alt="">
        
    @endif

</body>

</html>
