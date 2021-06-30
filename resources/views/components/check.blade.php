@props([
    'label' => null,
    'checkLabel' => null,
    'help' => null,
    'switch' => false,
])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model);
    $id = $attributes->get('id', $model);

    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($key),
    ])->merge([
        'type' => 'checkbox',
        'id' => $id,
    ]);
@endphp

<div>
    <x-bs::label :label="$label"/>

    <div class="form-check {{ $switch ? 'form-switch' : '' }}">
        <input {{ $attributes }}>

        <x-bs::check-label :for="$id" :label="$checkLabel"/>

        <x-bs::error :key="$key"/>

        <x-bs::help :label="$help"/>
    </div>
</div>
