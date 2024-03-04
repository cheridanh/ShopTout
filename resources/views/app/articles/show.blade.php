@extends('layouts.app.app')

@section('title', $article->name)

@section('content')

    <div class="container p-5 w-75">
        <h1>{{ $article->name }}</h1>
        <h2>{{ number_format($article->price, thousands_separator: ' ') }} XAF</h2>
        <hr>
        <div class="mt-4">
            @include('partials.flash')
            <form action="{{ route('articles.command', $article) }}" method="POST" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('partials.input', ['class' => 'col-3' , 'label' => 'Prénom', 'name' => 'firstname'])
                    @include('partials.input', ['class' => 'col-3' , 'label' => 'Nom', 'name' => 'lastname'])
                </div>
                <div class="row">
                    @include('partials.input', ['class' => 'col-3' , 'label' => 'Téléphone', 'name' => 'phone'])
                    @include('partials.input', ['class' => 'col-3' , 'label' => 'Quartier', 'name' => 'quarter'])
                </div>
                <div class="row">
                    @include('partials.select-choice-size', ['class' => 'col-3' , 'label' => 'Tailles', 'name' => 'size '])
                    @include('partials.select-choice-color', ['class' => 'col-3' , 'label' => 'Couleurs', 'name' => 'color'])
                </div>
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

@endsection
