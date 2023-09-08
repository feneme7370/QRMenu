@props(['title' => ''])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex gap-2 inline-flex items-center justify-center p-2 h-min bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orante-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{$slot}}{{ $title }}
</button>
