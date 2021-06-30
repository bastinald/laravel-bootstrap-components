@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'form-text',
    ])->merge([
        //
    ]);
@endphp

@if($label || !$slot->isEmpty())
    <div {{ $attributes }}>
        {{ $label ?? $slot }}
    </div>
@endif
