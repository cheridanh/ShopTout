@php

    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);

@endphp

<div @class(["form-group", $class])>

    <label class="m-2 @error($name) is-invalid @enderror" for="{{ $name }}">{{ $label }}</label>

   <select class="select" name="{{ $name }}[]" id="{{ $name }}" multiple>
       @foreach($colors as $k => $v)
           <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
       @endforeach
   </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
