@extends('layouts.app.app')

@section('title', $article->name)

@section('content')

    <div class="container p-5 w-75">

        <h1>{{ $article->name }}</h1>
        <h2>{{ number_format($article->price, thousands_separator: ' ') }} XAF</h2>
        <hr>

        <div class="row">
            <div class="col-4">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach($article->pictures as $k => $picture)
                            <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                                <img src="{{ $picture->getImageUrl() }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-8">
                <div class="mt-4">
                    @include('partials.flash')
                    <form action="{{ route('articles.command', $article) }}" method="POST" class="vstack gap-3">
                        @csrf
                        <div class="row">
                            @include('partials.input', ['class' => 'col-3' , 'label' => 'Prénom', 'name' => 'firstname', 'value' => 'Chéridanh'])
                            @include('partials.input', ['class' => 'col-3' , 'label' => 'Nom', 'name' => 'lastname', 'value' => 'TSIELA'])
                        </div>
                        <div class="row">
                            @include('partials.input', ['class' => 'col-3' , 'label' => 'Téléphone', 'name' => 'phone', 'value' => '064143445'])
                            @include('partials.input', ['class' => 'col-3' , 'label' => 'Quartier', 'name' => 'quarter', 'value' => 'Bacongo'])
                        </div>
                        {{--
                        <div class="row">
                            @include('partials.select-choice-size', ['class' => 'col-3' , 'label' => 'Tailles', 'name' => 'size-choice'])
                            @include('partials.select-choice-color', ['class' => 'col-3' , 'label' => 'Couleurs', 'name' => 'color-choice'])
                        </div>
                        --}}
                        <div>
                            <button class="btn btn-success">
                                Commander
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <h2>Description</h2>
                    <p>{{ nl2br($article->description) }}</p>
                    {{--
                    <div class="row">
                        <div class="col-4">
                            <h2>Tailles disponibles</h2>
                            <ul class="list-group">
                                @foreach($article->sizes as $size)
                                    <li class="list-group-item">
                                        {{ $size->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-3">
                            <h2>Couleurs</h2>
                            <ul class="list-group">
                                @foreach($article->colors as $color)
                                    <li class="list-group-item">
                                        {{ $color->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>

@endsection
