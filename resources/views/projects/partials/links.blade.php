<div class="col-8">
    @foreach($project->links as $link)
        <a href="{{$link->url}}" target="_blank" class="btn btn-social btn-{{$link->class}} btn-secondary m-1">
            <span class="fa fa-{{$link->class}}"></span>
            {{ isset($link->name)?$link->name:$project->name}}
        </a>
        {!! isset($link->tooltip)?"<p>" . $link->tooltip . "</p>":""!!}
    @endforeach
</div>
