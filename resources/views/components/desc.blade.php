@props([
    'title' => null,
    'data' => null,
])

@php
    $attributes = $attributes->class([
        'mb-0',
    ])->merge([
        //
    ]);
@endphp

<dl {{ $attributes }}>
    <dt>{{ $title }}</dt>
    <dd class="mb-0">{{ $data ?? $slot }}</dd>
</dl>
