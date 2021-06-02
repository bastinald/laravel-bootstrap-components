@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
])

@php
    $attributes = $attributes->class([
        'dropdown-item',
        'active' => ($href = $attributes->get('href', $route ? route($route) : ($url ? url($url) : null))) == Request::url(),
    ])->merge([
        'href' => $href,
    ]);
@endphp

<li>
    <{{ $href ? 'a' : 'button' }} {{ $attributes }}>
        @if($icon)
            <x-bs::icon :name="$icon"/>
        @endif

        {{ $label ?? $slot }}
    </{{ $href ? 'a' : 'button' }}>
</li>
