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

@if($icon)
    <span {{ $attributes }}>
        <x-bs::icon :name="$icon"/>
    </span>
@elseif($label || !$slot->isEmpty())
    <span {{ $attributes }}>
        {{ $label ?? $slot }}
    </span>
@endif
