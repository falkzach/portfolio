@extends('template.base')

@section('body')
    <div class="inner text-left">
        <br>
        <h1>Graduate Projects</h1>
        <div id="projects" role="tablist" aria-multiselectable="true">
            @foreach($projects as $project)
                <div class="card bg-dark text-white">
                    <div class="card-header" role="tab" id="heading-{{$project->id}}">
                        <h4 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-parent="#projects" data-target="#project-{{$project->id}}" aria-controls="project-{{$project->id}}">
                                {{$project->name}}
                            </button>
                        </h4>
                    </div>
                        <div class="collapse" role="tabpanel" id="project-{{$project->id}}" aria-labelledby="headingOne">
                            <div class="card-body">
                                <p class="text-left"><pre class="text-light">{!! $project->assignment!!}</pre></p>
                                <p class="text-left"><pre class="text-light">{!! $project->description!!}</pre></p>
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
@endsection

@section('javascript')
    <script src="{!! asset("js/init_highlight.js") !!}"></script>
@endsection
