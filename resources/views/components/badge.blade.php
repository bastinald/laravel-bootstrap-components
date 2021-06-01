@props([
    'color' => 'primary',
    'icon' => null,
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'badge bg-' . $color,
    ])->merge([
        //
    ]);
@endphp

<span {{ $attributes }}>
    @if($icon)
        <x-bs::icon :name="$icon"/>
    @endif

    {{ $label ?? $slot }}
</span>
