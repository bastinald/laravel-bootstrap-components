@props([
    'name' => null,
    'color' => null,
    'style' => config('laravel-bootstrap-components.font_awesome_style'),
    'size' => null,
    'spin' => false,
    'pulse' => false,
])

@php
    $attributes = $attributes->class([
        'fa' . Str::lower(Str::limit($style, 1, null)) . ' fa-fw fa-' . $name,
        'fa-' . $size => $size,
        'fa-spin' => $spin,
        'fa-pulse' => $pulse,
        'text-' . $color => $color,
    ])->merge([
        //
    ]);
@endphp

<i {{ $attributes }}></i>
