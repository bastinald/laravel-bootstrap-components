@props([
    'label' => null,
    'options' => [],
    'help' => null,
    'switch' => false,
    'model' => null,
    'lazy' => false,
])

@php
    if ($lazy) $bind = 'lazy';
    else $bind = 'defer';

    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model ?? $wireModel);
    $id = $attributes->get('id', $model ?? $wireModel);
    $prefix = config('laravel-bootstrap-components.use_with_model_trait') ? 'model.' : null;
    $options = Arr::isAssoc($options) ? $options : array_combine($options, $options);

    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($key),
    ])->merge([
        'type' => 'radio',
        'name' => $key,
        'wire:model.' . $bind => $model ? $prefix . $model : null,
    ]);
@endphp

<div>
    <x-bs::label :label="$label"/>

    @foreach($options as $optionValue => $optionLabel)
        <div class="form-check {{ $switch ? 'form-switch' : '' }}">
            @php($optionId = $id . '_' . $loop->index)

            <input {{ $attributes->merge(['id' => $optionId, 'value' => $optionValue]) }}>

            <x-bs::check-label :for="$optionId" :label="$optionLabel"/>

            @if($loop->last)
                <x-bs::error :key="$key"/>

                <x-bs::help :label="$help"/>
            @endif
        </div>
    @endforeach
</div>
