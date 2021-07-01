@props([
    'label' => null,
    'type' => 'text',
    'prepend' => null,
    'prependIcon' => null,
    'append' => null,
    'appendIcon' => null,
    'size' => null,
    'help' => null,
])

@php
    if ($type == 'number') $inputmode = 'decimal';
    else if (in_array($type, ['tel', 'search', 'email', 'url'])) $inputmode = $type;
    else $inputmode = 'text';

    $model = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model);
    $id = $attributes->get('id', $model);

    $attributes = $attributes->class([
        'form-control',
        'form-control-' . $size => $size,
        'rounded-end' => !$append,
        'is-invalid' => $errors->has($key),
    ])->merge([
        'type' => $type,
        'inputmode' => $inputmode,
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
