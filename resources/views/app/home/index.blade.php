@extends('layouts.app.app')

@section('title', 'Bienvenue')

@section('content')

    <div class="container p-3">
        <section class="text-center mb-3">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">{{ config('app.name') }}</h1>
                    <p class="pt-3 lead text-body-secondary">
                        Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet,
                        but not too short so folks don’t simply skip over it entirely.
                    </p>
                </div>
            </div>
        </section>

        <section class="">
            <div class="row text-center">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h2 class="fw-light mb-5">Nos articles</h2>
                </div>
            </div>

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
