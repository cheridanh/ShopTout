<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between align-items-center">
    <div class="container">
        <a class="navbar-brand text-center" href="{{ route('home') }}">
            @include('partials.icon', ['class' => 'bi-house'])
            <br>
            ShopTout
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @php
            $route = request()->route()->getName()
        @endphp
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a @class(['nav-link dropdown-toggle', 'active text-bg-primary btn btn-primary' => str_contains($route, 'sizes.')])
                       role="button" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('admin.sizes.index') }}">
                        @include('partials.icon', ['class' => 'bi-grid'])
                        <br>
                        Catégories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Hommes</a></li>
                        <li><a class="dropdown-item" href="#">Femmes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Accessoires et autres</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active text-bg-primary btn btn-primary' => str_contains($route, 'carts.')]) aria-current="page"
                       href="#">
                        @include('partials.icon', ['class' => 'bi-cart3'])
                        <br>
                        Panier
                    </a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand text-center" href="{{ route('admin.home.index') }}">
            @include('partials.icon', ['class' => 'bi-sliders'])
            <br>
            Administration
        </a>
    </div>
</nav>
