@if(isset($project->images))
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($project->images as $key => $image)
                <li data-target="#carousel-example-generic" data-slide-to="0" class="<?=$key===0?'active':''?>"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($project->images as $key => $image)
                <div class="carousel-item <?=$key===0?'active':''?>">
                    <img src="{{asset($image->path)}}" alt="{{$image->alt}}">
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endif
