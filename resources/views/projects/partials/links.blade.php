@foreach($project->links as $link)
<a href="{{$link->url}}" class="{{$link->css_class}}">{{$link->name}}</a>
@endforeach
