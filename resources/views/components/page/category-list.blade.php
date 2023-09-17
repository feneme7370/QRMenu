

<div class="mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">

        @foreach ($categories as $item)
        <!-- Ejemplo de una tarjeta -->
        <div class="bg-gray-100 p-2 rounded-lg shadow-md divide-y-2 divide-gray-300">
            <div>
                <h2 class="text-lg font-semibold mb-2"><a href="#">{{$item->name}}</a></h2>
                {{-- <p class="text-gray-600 text-sm mb-4 truncate">{{$item->description}}</p> --}}
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
        <!-- Agrega más tarjetas aquí -->

        @endforeach
    </div>
</div>