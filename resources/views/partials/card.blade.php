<div class="card h-100">
    @if($article->getPicture())
        <img src="{{ $article->getPicture()->getImageUrl(360, 230) }}" alt="" class="w-100">
    @else
        <img src="/AF1.webp" class="card-img-top" alt="">
    @endif
    <div class="card-body">
        <h5 class="card-title">
            {{ number_format($article->price, thousands_separator: ' ') }} XAF
        </h5>
        <p class="card-text lead">
            <a class="link-underline-light link-dark" href="{{ route('articles.show', ['slug' => $article->getSlug(), 'article' => $article]) }}">
                {{ $article->name }}
            </a>
        </p>
    </div>
    <div class="card-footer">
        <small class="text-body-secondary">
            <a href="#" class="btn btn-primary">
                @include('partials.icon', ['class' => 'bi-cart-plus'])
            </a>
        </small>
    </div>
</div>
