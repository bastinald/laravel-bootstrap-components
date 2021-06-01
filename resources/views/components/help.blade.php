@props([
    'message' => null,
])

@php
    $attributes = $attributes->class([
        'form-text',
    ])->merge([
        //
    ]);
@endphp

@if($message || !$slot->isEmpty())
    <div {{ $attributes }}>
        {{ $message ?? $slot }}
    </div>
@endif
