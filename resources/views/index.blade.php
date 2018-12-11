@extends('template.base')

@section('body')
    <div>
        @foreach($banners as $banner)
            {{--TODO: bug in bootstrap responsive image scaling, width when entering large view--}}
            <img src="{{ $banner['src'] }}" class="img-fluid rounded-top rounded-bottom" alt={{$banner['alt']}}>
        @endforeach
    </div>
    <div class="inner cover">
        <h1 class="cover-heading">{{$name}}</h1>
        @foreach($headlines as $headline)
            <p class="lead">{{ $headline }}</p>
        @endforeach
        <p class="lead"></p>
        <p class="lead">
            @foreach($socialLinks as $name => $link)
            <a href="{{$link['url']}}" class="btn btn-social btn-{{$link['class']}}">
                <span class="fa fa-{{$link['class']}}"></span>
                {{$name}}
            </a>
            @endforeach
        </p>
    </div>
@endsection
