@props([
    'label' => null,
    'switch' => false,
    'options' => [],
    'errorKey' => $attributes->get('name', Str::replaceFirst('model.', '', $attributes->whereStartsWith('wire:model')->first())),
    'help' => null,
])

@php
    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($errorKey),
    ])->merge([
        'name' => $errorKey,
        'type' => 'radio',
    ]);
@endphp

<div class="mb-3">
    <x-bs::label :label="$label"/>

    @foreach(Arr::isAssoc($options) ? $options : array_combine($options, $options) as $optionValue => $optionLabel)
        <div class="form-check {{ $switch ? 'form-switch' : '' }}">
            @php($optionId = $attributes->get('id', $errorKey) . '.' . $loop->index)

            <input {{ $attributes->merge(['id' => $optionId, 'value' => $optionValue]) }}>

            <x-bs::check-label :for="$optionId" :label="$optionLabel"/>

            @if($loop->last)
                <x-bs::error :key="$errorKey"/>

                <x-bs::help :message="$help"/>
            @endif
        </div>
    @endforeach
</div>
