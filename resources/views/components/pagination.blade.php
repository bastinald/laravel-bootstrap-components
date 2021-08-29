@props([
    'links' => null,
    'justify' => 'center',
])

@php
    $attributes = $attributes->class([
        'd-flex',
        'justify-content-' . $justify => $justify,
    ])->merge([
        //
    ]);
@endphp

@if($links->hasPages())
    <div {{ $attributes }}>
        @if(isset($this) && method_exists($this, 'initializeWithPagination'))
            <div class="d-block d-lg-none">
                {{ $links->links('livewire::simple-bootstrap') }}
            </div>

            <div class="d-none d-lg-block">
                {{ $links->links('livewire::bootstrap') }}
            </div>
        @else
            <div class="d-block d-lg-none">
                {{ $links->links('pagination::simple-bootstrap-4') }}
            </div>

            <div class="d-none d-lg-block">
                {{ $links->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endif
