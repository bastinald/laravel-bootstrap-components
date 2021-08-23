@props([
    'icon' => null,
    'label' => null,
    'color' => 'primary',
    'size' => null,
    'type' => 'button',
    'route' => null,
    'url' => null,
    'href' => null,
    'dismiss' => null,
    'toggle' => null,
    'click' => null,
    'confirm' => false,
])

@php
    if ($route) $href = route($route);
    else if ($url) $href = url($url);

    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
        'border-0 p-0' => $color == 'link',
    ])->merge([
        'type' => !$href ? $type : null,
        'href' => $href,
        'data-bs-dismiss' => $dismiss,
        'data-bs-toggle' => $toggle,
        'wire:click' => $click,
        'onclick' => $confirm ? 'confirm(\'' . __('Are you sure?') . '\') || event.stopImmediatePropagation()' : null,
    ]);
@endphp

<{{ $href ? 'a' : 'button' }} {{ $attributes }}>
    <x-bs::icon :name="$icon"/>

    {{ $label ?? $slot }}
</{{ $href ? 'a' : 'button' }}>
