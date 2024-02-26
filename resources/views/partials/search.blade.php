<div class="mb-3 text-center">
    <form action="" method="GET" class="container d-flex gap-2">
        <input class="form-control w-auto" type="text" name="name" value="{{ $input['name'] ?? '' }}" placeholder="Article clé">
        <input class="form-control w-auto" type="number" name="price" value="{{ $input['price'] ?? '' }}" placeholder="Budget max">
        <button class="btn btn-primary btn-sm flex-grow-0">
            @include('partials.icon', ['class' => 'bi-search'])
        </button>
    </form>
</div>
