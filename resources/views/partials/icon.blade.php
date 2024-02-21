@php
    $class ??= null;
    $size ??= 1.5;
    $style ??= 'font-size: ' . $size . 'rem;'
@endphp

<i class="bi {{ $class }}" style="{{ $style }}"></i>
