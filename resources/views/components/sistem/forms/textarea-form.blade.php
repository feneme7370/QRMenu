@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'resize-none w-full block border-gray-300 focus:border-gray-500 focus:ring-gray-500 rounded-md p-2 shadow-sm']) !!}  rows="7"></textarea>
