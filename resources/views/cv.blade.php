@extends('template.base')

@section('body')
    <div class="inner text-left col-8 mx-auto">
        <br>
        <h1>Graduate CV</h1>
        <div class="">
            <h2>Education</h2>
            <ul class="list-inline row">
                @foreach($degrees as $degree)
                    <li class="list-inline-item py-1 border-bottom">
                        <div>
                            <h3>{{$degree->name}}</h3>
                            <div class="col-6">
                                <p class="lead">{{$degree->institution}}, {{$degree->year}}</p>
                                <p class="lead">{{ $degree->gpa }} GPA</p>
                                @if(isset($degree->courses))
                                    <h4>Courses</h4>
                                    <ul class="list-inline row">
                                        @foreach($degree->courses as $course)
                                            <li class="list-inline-item col-5 py-2">{{ $course->course }} - {{ $course->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="">
            <h2>Teaching</h2>
            <p class="lead">{!! $teaching->headline !!}</p>
            <ul>
                @foreach($teaching->courses as $course)
                    <li>
                        <h3>{{$course->name}}</h3>
                        <p class="lead">{{$course->instructor}}, {{$course->semester}}</p>
                        <p>{!! $course->description !!}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="">
            <h2>Research</h2>
            <p class="lead">{!! $research->headline !!}</p>
            <ul>
                @foreach($research->projects as $project)
                    <li>
                        <h3>{{$project->name}}</h3>
                        <p class="lead">{{$project->description}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="">
            <h2>Guiding for the Outdoor Program</h2>
            <pre class="text-light">{!! $guiding !!}</pre>
        </div>
        <div class="">
            <h2>Other Work</h2>
            <ul>
            @foreach($others as $other)
                <li>
                    <h3>{{$other->name}}</h3>
                    <p class="text-light">{!! $other->description !!}</p>
                </li>
            @endforeach
            </ul>
        </div>
        <div class="">
            <h2>Reflections</h2>
            <pre class="text-light">{!! $reflections !!}</pre>
        </div>
    </div>

@endsection
