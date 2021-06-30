@props([
    'label' => null,
    'items' => null,
    'color' => 'primary',
    'size' => null,
])

@php
    $attributes = $attributes->class([
        'btn btn-' . $color . ' dropdown-toggle',
        'btn-' . $size => $size,
    ])->merge([
        'type' => 'button',
        'data-bs-toggle' => 'dropdown',
    ]);
@endphp

<div class="dropdown d-inline-block">
    <button {{ $attributes }}>
        {{ $label }}
    </button>

    <div class="dropdown-menu">
        {{ $items ?? $slot }}
    </div>
</div>
