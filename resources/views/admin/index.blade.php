@extends('layouts.admin.app')

@section('title', 'Administration')

@section('content')

    @include('layouts.admin.nav')

    <div class="container py-4">
        <div class="row align-items-md-stretch text-center">
            <div class="col-md-4">
                <div class="p-5 bg-body-tertiary border rounded-3">
                    @include('partials.icon', ['class' => 'bi-columns-gap', 'size' => '3'])
                    <h2 class="pt-2">Articles</h2>
                    <br>
                    <a class="btn btn-outline-secondary" type="button" href="{{ route('admin.articles.index') }}">Gérer</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 bg-body-tertiary border rounded-3">
                    @include('partials.icon', ['class' => 'bi-sort-down-alt', 'size' => '3'])
                    <h2 class="pt-2">Tailles</h2>
                    <br>
                    <a class="btn btn-outline-secondary" type="button" href="{{ route('admin.sizes.index') }}">Gérer</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 bg-body-tertiary border rounded-3">
                    @include('partials.icon', ['class' => 'bi-droplet-half', 'size' => '3'])
                    <h2 class="pt-2">Couleurs</h2>
                    <br>
                    <a class="btn btn-outline-secondary" type="button" href="{{ route('admin.colors.index') }}">Gérer</a>
                </div>
            </div>
        </div>
    </div>

@endsection
