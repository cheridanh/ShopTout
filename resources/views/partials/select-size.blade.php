@php

    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);

@endphp

<div @class(["form-group"])>

    <label class="m-2 @error($name) is-invalid @enderror" for="{{ $name }}">{{ $label }}</label>

   <select class="{{ $class }}" name="{{ $name }}[]" id="{{ $name }}" multiple>
       @foreach($sizes as $k => $v)
           <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
       @endforeach
   </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
