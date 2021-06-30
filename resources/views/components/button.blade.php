@props([
    'label' => null,
    'color' => 'primary',
    'size' => null,
    'route' => null,
    'url' => null,
    'href' => null,
    'dismiss' => null,
    'toggle' => null,
])

@php
    if ($route) $href = route($route);
    else if ($url) $href = url($url);

    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
    ])->merge([
        'href' => $href,
        'data-bs-dismiss' => $dismiss,
        'data-bs-toggle' => $toggle,
    ]);
@endphp

<{{ $href ? 'a' : 'button' }} {{ $attributes }}>
    {{ $label ?? $slot }}
</{{ $href ? 'a' : 'button' }}>
