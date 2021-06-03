@props([
    'icon' => null,
    'label' => null,
    'color' => 'primary',
    'size' => null,
    'route' => null,
    'url' => null,
    'toggle' => null,
])

@php
    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
    ])->merge([
        'href' => $href = $attributes->get('href', $route ? route($route) : ($url ? url($url) : null)),
        'data-bs-toggle' => $toggle,
    ]);
@endphp

<{{ $href ? 'a' : 'button' }} {{ $attributes }}>
    @if($icon)
        <x-bs::icon :name="$icon"/>
    @endif

    {{ $label ?? $slot }}
</{{ $href ? 'a' : 'button' }}>
