@props([
    'label' => null,
    'checkLabel' => null,
    'switch' => false,
    'errorKey' => $attributes->get('name', Str::replaceFirst('model.', '', $attributes->whereStartsWith('wire:model')->first())),
    'help' => null,
])

@php
    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($errorKey),
    ])->merge([
        'id' => $id = $attributes->get('id', $errorKey),
        'type' => 'checkbox',
    ]);
@endphp

<div class="mb-3">
    <x-bs::label :label="$label"/>

    <div class="form-check {{ $switch ? 'form-switch' : '' }}">
        <input {{ $attributes }}>

        <x-bs::check-label :for="$id" :label="$checkLabel"/>

        <x-bs::error :key="$errorKey"/>

        <x-bs::help :message="$help"/>
    </div>
</div>
