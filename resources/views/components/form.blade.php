@props([
    'submit' => null,
])

@php
    $attributes = $attributes->class([
        //
    ])->merge([
        'wire:submit.prevent' => $submit
    ]);
@endphp

<form {{ $attributes }}>
    {{ $slot }}
</form>
