<div id="carouselPictures" class="carousel slide">
    <div class="carousel-inner">
        @foreach($article->pictures as $k => $picture)
            <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                <img src="{{ $picture->getImageUrl(800, 530) }}" class="d-block w-100" alt="...">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPictures" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPictures" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
