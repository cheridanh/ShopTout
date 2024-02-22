@extends('layouts.admin.app')

@section('title', $article->exists ? "Modifier un article" : "Créer un article")

@section('content')

    <div class="container w-50 my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <a href="{{ route('admin.articles.index') }}" type="button"
               class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"></a>

            <h1>{{ $article->exists ? 'Modifier : ' . $article->name : 'Créer un article' }}</h1>
            <hr>

            <form class="vstack gap-2"
                  action="{{ route($article->exists ? 'admin.articles.update' : 'admin.articles.store', $article) }}"
                  method="post">
                @csrf
                @method($article->exists ? 'put' : 'post')

                <div class="row">

                    @include('partials.input', ['class' => 'col' , 'label' => "Nom de l'article", 'name' => 'name', 'value' => $article->name])

                    <div class="col row">
                        @include('partials.input', ['class' => 'col' , 'label' => 'Prix', 'name' => 'price', 'value' => $article->price])
                        @include('partials.input', ['class' => 'col' , 'label' => 'Stock', 'name' => 'stock', 'value' => $article->stock])
                    </div>

                </div>

                @include('partials.input', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $article->description])

                @include('partials.select', ['label' => 'Tailles', 'name' => 'sizes', 'value' => $article->sizes()->pluck('id'), 'multiple' => true])

                @include('partials.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $article->sold, 'sizes' => $sizes])

                <div>
                    @if($article->exists)
                        <button class="btn btn-outline-primary me-2 rounded-pill">
                            @include('partials.icon', ['class' => 'bi-check2-circle'])
                        </button>
                    @else
                        <button class="btn btn-outline-success me-2 rounded-pill">
                            @include('partials.icon', ['class' => 'bi-plus-circle'])
                        </button>
                    @endif
                </div>
            </form>

        </div>
    </div>

@endsection
