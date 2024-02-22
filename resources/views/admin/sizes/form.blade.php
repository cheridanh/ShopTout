@extends('layouts.admin.app')

@section('title', $size->exists ? "Modifier une taille" : "Créer une taille")

@section('content')

    <div class="container w-50 my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <a href="{{ route('admin.sizes.index') }}" type="button"
               class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"></a>

            <h1>{{ $size->exists ? 'Modifier : ' . $size->name : 'Créer une taille' }}</h1>
            <hr>

            <form class="vstack gap-2"
                  action="{{ route($size->exists ? 'admin.sizes.update' : 'admin.sizes.store', $size) }}"
                  method="post">
                @csrf
                @method($size->exists ? 'put' : 'post')

                <div class="row">

                    @include('partials.input', ['class' => 'col' , 'label' => "Nom", 'name' => 'name', 'value' => $size->name])

                </div>

                <div>
                    @if($size->exists)
                        <button class="btn btn-outline-primary me-2 rounded-pill">
                            @include('partials.icon', ['class' => 'bi-check2-circle'])
                        </button>
                    @else
                        <button class="btn btn-outline-success me-2 rounded-pill">
                            @include('partials.icon', ['class' => 'bi-plus-circle'])
                        </button>
                    @endif
                </div>
            </form>

        </div>
    </div>

@endsection
