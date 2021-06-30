@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'input-group-text',
    ])->merge([
        //
    ]);
@endphp

@if($label || !$slot->isEmpty())
    <span {{ $attributes }}>
        {{ $label ?? $slot }}
    </span>
@endif
