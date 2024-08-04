@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-rose-500 text-sm font-medium leading-5 text-white focus:outline-none focus:border-indigo-100 transition duration-150 ease-in-out margin-active'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-700 hover:border-gray-100 focus:outline-none focus:text-gray-700 focus:border-gray-100 transition duration-150 ease-in-out';
@endphp
<style>
    .margin-active {
        margin-top: 1px;
    }
</style>
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
