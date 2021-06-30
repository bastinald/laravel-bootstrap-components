@props([
    'label' => null,
    'options' => [],
    'help' => null,
    'switch' => false,
])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model);
    $id = $attributes->get('id', $model);
    $options = Arr::isAssoc($options) ? $options : array_combine($options, $options);

    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($key),
    ])->merge([
        'type' => 'radio',
        'name' => $key,
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
