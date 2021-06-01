@props([
    'name' => null,
    'color' => null,
])

@php
    $attributes = $attributes->class([
        config('laravel-bootstrap-components.icon_class_prefix') . $name,
        'text-' . $color => $color,
    ])->merge([
        //
    ]);
@endphp

<i {{ $attributes }}></i>
