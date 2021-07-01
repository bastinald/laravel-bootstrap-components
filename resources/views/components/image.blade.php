@props([
    'asset' => null,
    'src' => null,
    'fluid' => false,
    'thumbnail' => false,
    'rounded' => false,
])

@php
    if ($asset) $src = asset($asset);

    $attributes = $attributes->class([
        'img-fluid' => $fluid,
        'img-thumbnail' => $thumbnail,
        'rounded' => $rounded,
    ])->merge([
        'src' => $src,
    ]);
@endphp

<img {{ $attributes }}>
