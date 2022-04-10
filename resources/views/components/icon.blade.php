@props([
    'name' => null,
    'size' => null,
    'color' => null,
])

@php
    $attributes = $attributes->class([
        'bi bi-' . $name,
        'text-' . $color => $color,
        'fs-' . $size => $size
    ])->merge([
        //
    ]);
@endphp

@if($name)
    <i {{ $attributes }}></i>
@endif
