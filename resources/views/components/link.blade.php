@props([
    'label' => null,
    'route' => null,
    'url' => null,
    'href' => null,
])

@php
    if ($route) $href = route($route);
    else if ($url) $href = url($url);

    $attributes = $attributes->class([
        //
    ])->merge([
        'href' => $href,
    ]);
@endphp

<a {{ $attributes }}>
    {{ $label ?? $slot }}
</a>
