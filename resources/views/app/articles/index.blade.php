@extends('layouts.app.app')

@section('title', 'Tous nos articles')

@section('content')

    <div class="container pt-3">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-3 mb-4">
                    @include('partials.card')
                </div>
            @endforeach
        </div>

        <div class="my-4">
            {{ $articles->links() }}
        </div>
    </div>

@endsection
