@extends('template.base')

@section('body')
    <div class="inner cover content">
        <div>
            @foreach($banners as $banner)
                {{--TODO: bug in bootstrap responsive image scaling, width when entering large view--}}
                <img  src="{{ asset("img/loading.png") }}" data-src="{{ $banner['src'] }}" class="lozad img-fluid rounded-top rounded-bottom p-3" alt={{$banner['alt']}} />
            @endforeach
        </div>
        <h1 class="cover-heading display-4">{{$name}}</h1>
        @foreach($headlines as $headline)
            <p class="lead">{{ $headline }}</p>
        @endforeach
        <p class="lead">
            @foreach($socialLinks as $name => $link)
            <a href="{{$link->url}}" target="_blank" class="btn btn-social btn-{{$link->class}}">
                <span class="fa fa-{{$link->class}}"></span>
                {{$name}}
            </a>
            @endforeach
        </p>
    </div>
@endsection
