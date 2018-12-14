@extends('template.base')

@section('body')
    <div class="inner cover">
        <h1 class="cover-heading text-left">Outdoors</h1>

        <p class="lead text-left">{!! $outdoors->description !!}</p>

        <div id="hobbies-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($images as $key => $image)
                    <li data-target="#hobbies-carousel" data-slide-to="0" class="<?=$key===0?'active':''?>"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($images as $key => $image)
                    <div class="carousel-item <?=$key===0?'active':''?>">
                        <img class="lozad w-50 h-50 img-fluid rounded-top rounded-bottom p-3" data-src="{{asset($image->src)}}" alt="{{isset($image->alt)?$image->alt:""}}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#hobbies-carousel" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#hobbies-carousel" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection