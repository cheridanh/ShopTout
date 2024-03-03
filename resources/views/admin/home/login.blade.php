@extends('layouts.admin.app')

@section('title', 'Authentification')

@section('content')

    <div class="mt-4 container w-25">
        @include('partials.flash')
        <h1>Se connecter</h1>
        <form action="{{ route('doLogin') }}" method="post" class="vstack gap-3">
            @csrf
            @include('partials.input', ['type' => 'email', 'name' => 'email', 'label' => 'Email', 'class' => 'col'])
            @include('partials.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe', 'class' => 'col'])
            <div>
                <div class="btn btn-primary">Se connecter</div>
            </div>
        </form>
    </div>

@endsection
