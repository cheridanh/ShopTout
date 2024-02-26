@extends('layouts.admin.app')

@section('title', 'Articles')

@section('content')

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>@yield('title') : {{ $articles->count() }}</h1>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-success me-2 rounded-pill">
                @include('partials.icon', ['class' => 'bi-plus-circle'])
            </a>
        </div>
        <hr>
        <table class="table table-striped">

            <thead>
            <tr>
                <th>Nom</th>
                <th>Stock</th>
                <th>Prix</th>
                <th>Tailles</th>
                <th>Couleurs</th>
                <th class="text-end text-align-left">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->stock }}</td>
                    <td>{{ number_format($article->price, thousands_separator: ' ') }} XAF</td>
                    <td>
                        <ul class="list-group">
                            @foreach($article->sizes as $size)
                                <li class="list-group-item">
                                    {{ $size->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            @foreach($article->colors as $color)
                                <li class="list-group-item">
                                    {{ $color->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-primary me-2 rounded-pill">
                                @include('partials.icon', ['class' => 'bi-pencil-square'])
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-outline-danger me-2 rounded-pill">
                                    @include('partials.icon', ['class' => 'bi-trash3'])
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr>
        {{ $articles->links() }}
    </div>

@endsection
