<div class="bg-gray-100 px-6 py-2 rounded-lg shadow-md divide-y-2 divide-gray-400">
    <div>
        <h2 class="text-lg font-semibold mb-2"><a href="#">{{$item->name}}</a></h2>
        <p class="text-gray-600 text-sm mb-4 truncate">{{$item->description}}</p>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">Estado: {{$item->status ? 'Activo' :
                'Desabilitado'}}</span>
            <span class="text-sm text-gray-500 mb-2">ID: {{$item->id}}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">Membresia: {{$item->membership->name}}</span>
            <span class="text-sm text-gray-500 mb-2">Usuarios: {{$item->users->count()}}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 mb-2">Categorias: {{$item->categories->count()}}</span>
            <span class="text-sm text-gray-500 mb-2"></span>
        </div>
    </div>
    <div class="flex justify-between mt-2">
        
        <x-sistem.buttons.edit-text wire:click="editActionModal({{$item->id}})" wire:loading.attr="disabled"
            title="{{ __('Editar') }}" />
        <x-sistem.buttons.delete-text wire:click="openDeleteModal({{$item->id}})"
            wire:loading.attr="disabled" title="{{ __('Borrar') }}" />
    </div>
</div>