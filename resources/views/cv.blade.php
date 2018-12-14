@extends('template.base')

@section('body')
    <div class="inner cover text-left">
        <h1>Graduate CV</h1>
        <div class="">
            <h2>Education</h2>
            <ul>
                @foreach($degrees as $degree)
                    <li>{{$degree->name}}, {{$degree->institution}}, {{$degree->year}}</li>
                @endforeach
            </ul>
        </div>
        <div class="">
            <h2>Research</h2>
            <p class="lead">{!! $research->headline !!}</p>
            @foreach($research->projects as $project)
                <h3>{{$project->name}}</h3>
                <p class="lead">{{$project->description}}</p>
            @endforeach
        </div>
        <div class="">
            <h2>Teaching</h2>
            <p class="lead">{!! $teaching->headline !!}</p>
            @foreach($teaching->courses as $course)
                <h3>{{$course->name}}</h3>
                <p>{!! $course->description !!}</p>
            @endforeach
        </div>
        <div class="">
            <h2>Reflections</h2>
            <pre class="text-light">{!! $reflections !!}</pre>
        </div>
        <div class="">
            <h2>Outdoor Guiding</h2>
            <pre class="text-light">{!! $guiding !!}</pre>
        </div>
    </div>

@endsection
