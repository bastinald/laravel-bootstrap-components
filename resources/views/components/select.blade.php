@props([
    'label' => null,
    'size' => null,
    'prependIcon' => null,
    'prependLabel' => null,
    'appendIcon' => null,
    'appendLabel' => null,
    'placeholder' => null,
    'blankOption' => false,
    'options' => [],
    'errorKey' => $attributes->get('name', Str::replaceFirst('model.', '', $attributes->whereStartsWith('wire:model')->first())),
    'help' => null,
])

@php
    $attributes = $attributes->class([
        'form-select',
        'form-select-' . $size => $size,
        'rounded-end' => !$appendIcon && !$appendLabel,
        'is-invalid' => $errors->has($errorKey),
    ])->merge([
        'id' => $id = $attributes->get('id', $errorKey),
    ]);
@endphp

<div class="mb-3">
    <x-bs::label :for="$id" :label="$label"/>

    <div class="input-group">
        <x-bs::input-addon :icon="$prependIcon" :label="$prependLabel"/>

        <select {{ $attributes }}>
            @if($placeholder || $blankOption)
                <option value="">{{ $placeholder }}</option>
            @endif

            @foreach(Arr::isAssoc($options) ? $options : array_combine($options, $options) as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
            @endforeach
        </select>

        <x-bs::input-addon :icon="$appendIcon" :label="$appendLabel" class="rounded-end"/>

        <x-bs::error :key="$errorKey"/>
    </div>

    <x-bs::help :message="$help"/>
</div>
