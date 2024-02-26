@extends('layouts.app.app')

@section('title', 'Bienvenue')

@section('content')

    <div class="container pt-3">

        @include('partials.search')

        <section class="">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($articles as $article)
                    <div class="col">
                        @include('partials.card')
                    </div>
                @endforeach
            </div>
        </section>

    </div>

@endsection
