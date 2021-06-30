@props([
    'dismiss' => null,
])

@php
    $attributes = $attributes->class([
        'btn-close',
    ])->merge([
        'type' => 'button',
        'data-bs-dismiss' => $dismiss,
    ]);
@endphp

<button {{ $attributes }}></button>
