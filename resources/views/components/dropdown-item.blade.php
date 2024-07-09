@php
    $classes = 'block primary-color-hover p-2 sm:text-center'
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>