@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
    'href' => '#',
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
    <x-bs::icon :name="$icon"/>

    {{ $label ?? $slot }}
</a>
