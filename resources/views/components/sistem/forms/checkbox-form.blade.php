@props(['disabled' => false])

<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-500']) !!}>
