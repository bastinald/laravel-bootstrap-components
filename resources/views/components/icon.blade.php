@props([
    'name' => null,
])

@php
    $attributes = $attributes->class([
        config('laravel-bootstrap-components.icon_class_prefix') . $name,
    ])->merge([
        //
    ]);
@endphp

@if($name)
    <i {{ $attributes }}></i>
@endif
