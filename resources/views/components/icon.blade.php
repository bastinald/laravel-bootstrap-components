@props([
    'name' => null,
    'style' => config('laravel-bootstrap-components.font_awesome_style'),
    'size' => null,
    'color' => null,
    'spin' => false,
    'pulse' => false,
])

@php
    $attributes = $attributes->class([
        'fa' . Str::limit($style, 1, null) . ' fa-fw fa-' . $name,
        'fa-' . $size => $size,
        'text-' . $color => $color,
        'fa-spin' => $spin,
        'fa-pulse' => $pulse,
    ])->merge([
        //
    ]);
@endphp

@if($name)
    <i {{ $attributes }}></i>
@endif
