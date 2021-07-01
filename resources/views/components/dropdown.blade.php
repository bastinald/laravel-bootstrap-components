@props([
    'icon' => null,
    'label' => null,
    'items' => null,
    'color' => 'primary',
    'size' => null,
])

@php
    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
    ])->merge([
        'type' => 'button',
        'data-bs-toggle' => 'dropdown',
    ]);
@endphp

<div class="dropdown d-inline-block">
    <button {{ $attributes }}>
        <x-bs::icon :name="$icon"/>

        {{ $label }}
    </button>

    <div class="dropdown-menu">
        {{ $items ?? $slot }}
    </div>
</div>
