@props([
    'label' => null,
    'prepend' => null,
    'prependIcon' => null,
    'append' => null,
    'appendIcon' => null,
    'size' => null,
    'help' => null,
])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model);
    $id = $attributes->get('id', $model);

    $attributes = $attributes->class([
        'form-control form-control-color',
        'form-control-' . $size => $size,
        'rounded-end' => !$append,
        'is-invalid' => $errors->has($key),
    ])->merge([
        'type' => 'color',
        'id' => $id,
    ]);
@endphp

<div>
    <x-bs::label :for="$id" :label="$label"/>

    <div class="input-group">
        <x-bs::input-addon :icon="$prependIcon" :label="$prepend"/>

        <input {{ $attributes }}>

        <x-bs::input-addon :icon="$appendIcon" :label="$append" class="rounded-end"/>

        <x-bs::error :key="$key"/>
    </div>

    <x-bs::help :label="$help"/>
</div>
