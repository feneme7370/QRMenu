@props(['title'])

<div class="mt-1 mb-3 text-2xl flex justify-between items-center">
    <span>
        {{$title}}
    </span>

    {{$slot}}
</div>