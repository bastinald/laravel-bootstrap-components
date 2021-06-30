@props([
    'label' => null,
    'color' => 'primary',
    'size' => null,
])

@php
    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
    ])->merge([
        'type' => 'submit',
    ]);
@endphp

<button {{ $attributes }}>
    {{ $label ?? $slot }}
</button>
