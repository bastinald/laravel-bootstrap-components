@props([
    'label' => null,
    'color' => 'success',
    'dismissible' => false,
])

@php
    $attributes = $attributes->class([
        'alert alert-' . $color . ' fade show mb-0',
        'alert-dismissible' => $dismissible,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    {{ $label ?? $slot }}

    @if($dismissible)
        <x-bs::close dismiss="alert"/>
    @endif
</div>
