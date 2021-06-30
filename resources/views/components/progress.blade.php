@props([
    'label' => null,
    'percent' => 0,
    'color' => 'primary',
    'height' => null,
    'animated' => false,
    'striped' => false,
])

@php
    $attributes = $attributes->class([
        'progress-bar',
        'progress-bar-animated' => $animated,
        'progress-bar-striped' => $striped,
        'bg-' . $color => $color,
    ])->merge([
        'style' => 'width: ' . $percent . '%',
    ]);
@endphp

<div class="progress mb-0" style="{{ $height ? 'height: ' . $height . 'px;' : '' }}">
    <div {{ $attributes }}>
        {{ $label ?? $slot }}
    </div>
</div>
