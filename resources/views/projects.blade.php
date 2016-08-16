@extends('template.base')

@section('body')
    <h1>Projects</h1>
    <div id="projects" role="tablist" aria-multiselectable="true">

        @foreach($projects as $project)

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-{{$project->id}}">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#projects" href="#project-{{$project->id}}" aria-controls="project-{{$project->id}}">
                        {{$project->name}}
                    </a>
                </h4>
            </div>
            <div id="project-{{$project->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                @foreach($project->images as $image)
                    @include('projects.partials.image')
                @endforeach
                <p class="lead">{{$project->description}}</p>
                @foreach($project->links as $link)
                    @include('projects.partials.link')
                @endforeach
                <br>
            </div>
        </div>

        @endforeach

    </div>
@endsection
