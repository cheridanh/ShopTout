@extends('layouts.app.app')

@section('title', 'Bienvenue')

@section('content')

    <div class="container pt-3">

        @include('partials.search')

        <div class="row">
            @foreach($articles as $article)
                <div class="col-6 col-md-2 mb-4">
                    @include('partials.card')
                </div>
            @endforeach
        </div>

        <div class="my-4">
            {{ $articles->links() }}
        </div>
    </div>

    </div>

@endsection
