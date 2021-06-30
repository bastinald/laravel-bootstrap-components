@props([
    'label' => null,
    'options' => [],
    'prepend' => null,
    'append' => null,
    'size' => null,
    'help' => null,
])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model);
    $id = $attributes->get('id', $model);
    $list = $attributes->get('list', $key . '_list');

    $attributes = $attributes->class([
        'form-control',
        'form-control-' . $size => $size,
        'rounded-end' => !$append,
        'is-invalid' => $errors->has($key),
    ])->merge([
        'list' => $list,
        'id' => $id,
    ]);
@endphp

<div>
    <x-bs::label :for="$id" :label="$label"/>

    <div class="input-group">
        <x-bs::input-addon :label="$prepend"/>

        <input {{ $attributes }}>

        <datalist id="{{ $list }}">
            @foreach($options as $option)
                <option value="{{ $option }}">
            @endforeach
        </datalist>

        <x-bs::input-addon :label="$append" class="rounded-end"/>

        <x-bs::error :key="$key"/>
    </div>

    <x-bs::help :label="$help"/>
</div>
