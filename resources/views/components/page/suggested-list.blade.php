<div class="bg-gray-100 px-6 py-2 rounded-lg shadow-md divide-y-2 divide-gray-400">
    <div>
        <h2 class="text-lg font-semibold mb-2"><a href="#">{{$item->product->name}}</a></h2>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">Creado: {{$item->user->name}} - {{$item->company->name}}</span>
            <span class="text-sm text-gray-500 mb-2">ID: {{$item->id}}</span>
        </div>
    </div>
    <div class="flex justify-center mt-2">
        <x-sistem.buttons.delete-text wire:click="deleteSuggested({{$item->id}})"
            wire:loading.attr="disabled" title="{{ __('Borrar') }}" />
    </div>
</div>