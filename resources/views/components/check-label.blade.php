@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'form-check-label',
    ])->merge([
        //
    ]);
@endphp

<label {{ $attributes }}>
    {{ $label ?? $slot }}
</label>
