@if( ! Route::is('login'))
    <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between align-items-center">
        <div class="container">
            <a class="navbar-brand text-center" href="{{ route('admin.home.index') }}">
                @include('partials.icon', ['class' => 'bi-sliders'])
                <br>
                Administration
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if(! Route::is('admin.index', 'admin.home.index'))
                @php
                    $route = request()->route()->getName()
                @endphp
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a @class(['nav-link', 'active text-bg-primary btn btn-primary' => str_contains($route, 'articles.')]) aria-current="page"
                               href="{{ route('admin.articles.index') }}">
                                @include('partials.icon', ['class' => 'bi-columns-gap'])
                                <br>
                                Gestion des articles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active text-bg-primary btn btn-primary' => str_contains($route, 'sizes.')])
                               href="{{ route('admin.sizes.index') }}">
                                @include('partials.icon', ['class' => 'bi-sort-down-alt'])
                                <br>
                                Gestion des tailles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active text-bg-primary btn btn-primary' => str_contains($route, 'colors.')])
                               href="{{ route('admin.colors.index') }}">
                                @include('partials.icon', ['class' => 'bi-droplet-half'])
                                <br>
                                Gestion des couleurs
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            <a class="navbar-brand text-center" href="{{ route('home') }}">
                @include('partials.icon', ['class' => 'bi-house'])
                <br>
                {{ config('app.name') }}
            </a>
        </div>
    </nav>
@endif
