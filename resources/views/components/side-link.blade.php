@props(['active'])

@php
$classes = $active ? 'bg-birumuda hover:bg-birumuda' : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>