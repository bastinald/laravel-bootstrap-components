@props([
    'color' => 'primary',
    'size' => null,
    'toggleIcon' => false,
    'icon' => null,
    'label' => null,
    'justify' => null,
])

@php
    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
        'dropdown-toggle' => $toggleIcon,
    ])->merge([
        'type' => 'button',
        'data-bs-toggle' => 'dropdown',
    ]);
@endphp

<div class="dropdown">
    <button {{ $attributes }}>
        @if($icon)
            <x-bs::icon :name="$icon"/>
        @endif

        {{ $label }}
    </button>
    <ul class="dropdown-menu {{ $justify ? 'dropdown-menu-' . $justify : '' }}">
        {{ $slot }}
    </ul>
</div>
