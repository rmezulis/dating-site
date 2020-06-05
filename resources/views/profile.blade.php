<div id="pictures" class="carousel slide" data-interval="false" data-ride="carousel" style="width: 500px">
    <ol class="carousel-indicators">
        @foreach($pictures as $picture)

            <li data-target="#pictures" data-slide-to="{{ $picture->location }}"
                {{ ($loop->first) ? 'class="active"': null }}></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($pictures as $picture)
            <div class="carousel-item {{ ($loop->first) ? "active": null }}">
                <img class="d-block w-100" src="{{ $picture->getPicture() }}"
                     alt="{{ $picture->location }} slide">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#pictures" role="button"
       data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#pictures" role="button"
       data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="sr-only" >Next</span>
    </a>
</div>

