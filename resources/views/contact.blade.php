@extends('template.base')

@section('body')
    <div class="inner cover">
        <h1 class="cover-heading">Contact</h1>
        <p class="lead">//TODO: contact form coming soon. In the meantime, please contact me through one of the methods bellow.</p>
        <p class="lead">
            @foreach($socialLinks as $name => $link)
                <a href="{{$link->url}}" class="btn btn-social btn-{{$link->class}}">
                    <span class="fa fa-{{$link->class}}"></span>
                    {{$name}}
                </a>
            @endforeach
        </p>
    </div>
@endsection
