@extends('template.base')

@section('body')
<div class="row">
    <div class="inner text-left col-8 mx-auto">
        <br>
        <h1>Graduate Projects</h1>
        <p class="lead">{{ $headline }}</p>
        <div id="projects" role="tablist" aria-multiselectable="true">
            @foreach($projects as $project)
            <div class="card bg-dark text-white">
                <div class="card-header" role="tab" id="heading-{{$project->id}}">
                    <h2 class="mb-0 pull-left">
                        <button class="btn btn-link" data-toggle="collapse" data-parent="#projects" data-target="#project-{{$project->id}}" aria-controls="project-{{$project->id}}">
                            {{$project->name}}
                        </button>
                    </h2>
                    <pre class="mb-0 text-light pull-right">{{ $project->course }}</pre>

                </div>
                    <div class="collapse" role="tabpanel" id="project-{{$project->id}}" aria-labelledby="headingOne">
                        <div class="card-body">
                            <h3>Assignment:</h3>
                            <pre class="text-light">{!! $project->assignment!!}</pre>
                            <h3>Project Description:</h3>
                            <pre class="text-light">{!! $project->description!!}</pre>
                            @include('projects.partials.snippet')
                            @include('projects.partials.images')
                            @include('projects.partials.links')
                        </div>
                    </div>
                <br />
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{!! asset("js/init_highlight.js") !!}"></script>
@endsection
