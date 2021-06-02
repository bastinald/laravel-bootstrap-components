@props([
    'toggleIcon' => true,
    'icon' => null,
    'label' => null,
    'justify' => null,
])

@php
    $attributes = $attributes->class([
        'nav-link',
        'dropdown-toggle' => $toggleIcon,
    ])->merge([
        'href' => '#',
        'data-bs-toggle' => 'dropdown',
    ]);
@endphp

<li class="nav-item dropdown">
    <a {{ $attributes }}>
        @if($icon)
            <x-bs::icon :name="$icon"/>
        @endif

        {{ $label }}
    </a>
    <ul class="dropdown-menu {{ $justify ? 'dropdown-menu-' . $justify : '' }}">
        {{ $slot }}
    </ul>
</li>
