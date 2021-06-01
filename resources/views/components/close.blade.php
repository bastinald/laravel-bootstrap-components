@props([
    'color' => null,
    'dismiss' => null,
])

@php
    $attributes = $attributes->class([
        'btn-close',
        'btn-close-' . $color => $color,
    ])->merge([
        'type' => 'button',
        'data-bs-dismiss' => $dismiss,
    ]);
@endphp

<button {{ $attributes }}></button>
