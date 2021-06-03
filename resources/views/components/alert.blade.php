@props([
    'icon' => null,
    'message' => null,
    'color' => 'primary',
    'dismissible' => false,
])

@php
    $attributes = $attributes->class([
        'alert alert-' . $color . ' fade show',
        'alert-dismissible' => $dismissible,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    @if($icon)
        <x-bs::icon :name="$icon"/>
    @endif

    {{ $message ?? $slot }}

    @if($dismissible)
        <x-bs::close dismiss="alert"/>
    @endif
</div>
