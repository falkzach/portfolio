@extends('template.base')

@section('body')
    <img src="{{ asset("img/canyon_creek_pano.jpg") }}" class="img-fluid rounded-top rounded-bottom" alt="Canyon Creek Panoramic of an alpine lake and surrounding peaks">
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
