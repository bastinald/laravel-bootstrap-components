@props([
    'icon' => null,
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'input-group-text',
    ])->merge([
        //
    ]);
@endphp

@if($icon || $label || !$slot->isEmpty())
    <span {{ $attributes }}>
        <x-bs::icon :name="$icon"/>

        {{ $label ?? $slot }}
    </span>
@endif
