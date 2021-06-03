@props([
    'icon' => null,
    'label' => null,
    'color' => 'primary',
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
