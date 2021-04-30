@props(['active'])

@php
$classes = ($active ?? 1)
            ? 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium'
            : 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
