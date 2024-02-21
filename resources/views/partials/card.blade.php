<div class="card">
    <img src="" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
                {{ $property->title }}
            </a>
        </h5>
        <p class="card-text">{{ $property->surface }} m²</p>
        <p class="card-text">{{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-primary fw-bold ">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
