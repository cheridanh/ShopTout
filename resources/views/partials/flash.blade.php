@if(session('success'))
    <div class="mt-3 container alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('danger'))
    <div class="mt-3 container alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
