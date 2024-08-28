<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <title>@yield('title') | {{ config('app.name') }}</title>

</head>
<body>
    <main>
        @include('layouts.admin.nav')
        @include('partials.flash')
        @if($errors->any())
            <div class="alert-danger">
                <ul class="my-0">
                    @foreach($errors->all as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.select').forEach((el)=>{
            let settings = {plugins: {remove_button: {title: 'Supprimer'}}};
            new TomSelect(el,settings);
        });
    </script>
    {{-- <script>new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})</script> --}}
</body>
</html>
