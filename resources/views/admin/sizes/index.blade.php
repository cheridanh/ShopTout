@extends('layouts.admin.app')

@section('title', 'Tailles')

@section('content')

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>@yield('title')</h1>
            <a href="{{ route('admin.sizes.create') }}" class="btn btn-outline-success me-2 rounded-pill">
                @include('partials.icon', ['class' => 'bi-plus-circle'])
            </a>
        </div>
        <hr>
        <table class="table table-striped">

            <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td>{{ $size->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.sizes.edit', $size) }}" class="btn btn-outline-primary me-2 rounded-pill">
                                @include('partials.icon', ['class' => 'bi-pencil-square'])
                            </a>
                            <form action="{{ route('admin.sizes.destroy', $size) }}" method="post">
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
    </div>

@endsection
