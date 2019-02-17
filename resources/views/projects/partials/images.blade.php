@if(isset($project->images))
    <div id="{{str_replace(" ", "-", $project->name)}}-carousel" class="carousel slide text-center" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($project->images as $key => $image)
                <li data-target="#{{str_replace(" ", "-", $project->name)}}-carousel" data-slide-to="{{$key}}" class="<?=$key===0?'active':''?>"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($project->images as $key => $image)
                <div class="carousel-item <?=$key===0?'active':''?>">
                    <img class="lozad img-fluid rounded-top rounded-bottom p-3" data-src="{{asset($image->src)}}" alt="{{isset($image->alt)?$image->alt:""}}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#{{str_replace(" ", "-", $project->name)}}-carousel" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#{{str_replace(" ", "-", $project->name)}}-carousel" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endif
