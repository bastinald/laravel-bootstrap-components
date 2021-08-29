@props([
    'term' => null,
    'details' => null,
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
    <dt>{{ $term }}</dt>

    <dd class="mb-0">
        @if($details || !$slot->isEmpty())
            {{ $details ?? $slot }}
        @elseif($date)
            @displayDate($date)
        @else
            {{ __('N/A') }}
        @endif
    </dd>
</dl>
