@foreach($project->links as $link)
<a href="{{$link->url}}" target="_blank" class="btn btn-social btn-{{$link->class}} btn-secondary">
    <span class="fa fa-{{$link->class}}"></span>
    {{$project->name}}
</a>
@endforeach
