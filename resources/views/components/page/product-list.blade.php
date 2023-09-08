<div class="bg-gray-100 p-2 rounded-lg shadow-md divide-y-2 divide-gray-300">
    <div class="relative">
        <span class="text-white text-sm absolute end-0 {{ $item->suggested ? 'bg-orange-400 rounded-full px-2 py-1' : ''}}">{{$item->suggested ? 'D' :
            ''}}</span>
        <h2 class="text-lg font-semibold mb-2"><a href="#">{{$item->name}}</a></h2>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">{{$item->subcategory->name}} / {{$item->subcategory->category->name}}</span>
            <span class="text-sm text-gray-500 mb-2">Precio: ${{ number_format($item->price, 2,",",".") }}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">{{$item->status ? 'Activo' : 'Desabilitado'}}</span>
            <span class="text-sm text-gray-500 mb-2">ID: {{$item->id}}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">Creado: {{$item->user->lastname}},
                {{$item->user->name}}</span>
            <span></span>
        </div>
    </div>
    <div class="flex justify-between mt-2 pt-2">
        <x-sistem.buttons.edit-text wire:click="editActionModal({{$item->id}})" wire:loading.attr="disabled"
            title="{{ __('Editar') }}" />
        <x-sistem.buttons.delete-text wire:click="openDeleteModal({{$item->id}})"
            wire:loading.attr="disabled" title="{{ __('Borrar') }}" />
    </div>
</div>