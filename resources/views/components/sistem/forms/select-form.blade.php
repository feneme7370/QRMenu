@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full block border-gray-300 focus:border-gray-500 focus:ring-gray-500 rounded-md p-2 shadow-sm']) !!}>
    <option value="">-- Seleccionar --</option>
    {{ $slot }}
</select>