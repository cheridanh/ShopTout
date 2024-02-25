<div class="card h-100">
    <img src="/AF1.webp" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('articles.show', ['slug' => $article->getSlug(), 'article' => $article]) }}">
                {{ $article->name }}
            </a>
        </h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">
        <small class="text-body-secondary">
            <a href="#" class="btn btn-primary">
                @include('partials.icon', ['class' => 'bi-cart-plus'])
            </a>
        </small>
    </div>
</div>
