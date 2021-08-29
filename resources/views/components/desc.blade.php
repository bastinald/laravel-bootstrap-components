@props([
    'title' => null,
    'data' => null,
    'date' => null,
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

    <dd class="mb-0">
        @if($data || !$slot->isEmpty())
            {{ $data ?? $slot }}
        @elseif($date)
            @displayDate($date)
        @else
            {{ __('N/A') }}
        @endif
    </dd>
</dl>
