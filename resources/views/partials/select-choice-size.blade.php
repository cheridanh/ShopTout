@php

    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);

@endphp

<div @class(["form-group", $class])>

    <label class="m-2 @error($name) is-invalid @enderror" for="{{ $name }}">{{ $label }}</label>

   <select name="{{ $name }}" id="{{ $name }}" class="form-select">
       <option selected>Choisir la taille</option>
       @foreach($article->sizes as $size)
           <option value="{{ $size->name }}">{{ $size->name }}</option>
       @endforeach
   </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
