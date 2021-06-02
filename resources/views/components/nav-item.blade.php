@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
])

@php
    $attributes = $attributes->class([
        'nav-link',
        'active' => ($href = $attributes->get('href', $route ? route($route) : ($url ? url($url) : '#'))) == Request::url(),
    ])->merge([
        'href' => $href,
    ]);
@endphp

<li class="nav-item">
    <a {{ $attributes }}>
        @if($icon)
            <x-bs::icon :name="$icon"/>
        @endif

        {{ $label ?? $slot }}
    </a>
</li>
