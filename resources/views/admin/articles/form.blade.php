@extends('layouts.admin.app')

@section('title', $article->exists ? "Modifier un article" : "Créer un article")

@section('content')

    <div class="container w-75 my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <a href="{{ route('admin.articles.index') }}" type="button" class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10"
               aria-label="Close"></a>

            <h1>{{ $article->exists ? 'Modifier : ' . $article->name : 'Créer un article' }}</h1>
            <hr>

            <form class="vstack gap-2" action="{{ route($article->exists ? 'admin.articles.update' : 'admin.articles.store', $article) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method($article->exists ? 'put' : 'post')

                <div class="row">

                    <div class="col vstack gap-2" style="flex: 100">
                        <div class="row">
                            @include('partials.input', ['class' => 'col' , 'label' => "Nom de l'article", 'name' => 'name', 'value' => $article->name])
                            <div class="col row">
                                @include('partials.input', ['class' => 'col' , 'label' => 'Prix', 'name' => 'price', 'value' => $article->price])
                                @include('partials.input', ['class' => 'col' , 'label' => 'Stock', 'name' => 'stock', 'value' => $article->stock])
                            </div>
                        </div>
                        @include('partials.input', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $article->description])
                        <div class="row">
                            @include('partials.select-color', ['class' => 'col', 'label' => 'Couleurs', 'name' => 'colors', 'value' => $article->colors()->pluck('id'), 'multiple' => true, 'colors' => $colors])
                            <div class="col row">
                                @include('partials.select-size', ['class' => 'col', 'label' => 'Tailles', 'name' => 'sizes', 'value' => $article->sizes()->pluck('id'), 'multiple' => true, 'sizes' => $sizes,])
                            </div>
                        </div>
                        @include('partials.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $article->sold])
                    </div>

                    <div class="col vstack gap-3" style="flex: 25">
                        @foreach($article->pictures as $picture)
                            <div id="picture{{ $picture->id }}" class="position-relative">
                                <img src="{{ $picture->getImageUrl(800, 530) }}" alt="" class="w-100 d-block">
                                <button type="button" class="btn btn-danger position-absolute bottom-0 w-100 start-0"
                                        hx-delete="{{ route('admin.picture.destroy', $picture) }}"
                                        hx-target="#picture{{ $picture->id }}"
                                        hx-swap="delete">
                                    Supprimer
                                </button>
                            </div>
                        @endforeach
                        @include('partials.upload', ['name' => 'pictures', 'label' => 'Images', 'multiple' => 'true'])
                    </div>

                </div>

                <div>
                    @if($article->exists)
                        <button class="btn btn-outline-primary me-2">
                            @include('partials.icon', ['class' => 'bi-check2-circle'])
                        </button>
                    @else
                        <button class="btn btn-outline-success me-2">
                            @include('partials.icon', ['class' => 'bi-plus-circle'])
                        </button>
                    @endif
                </div>
            </form>

        </div>
    </div>

@endsection
