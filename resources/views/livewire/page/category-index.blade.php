<div>
    {{-- mensaje de alerta --}}
    <x-sistem.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" />

    {{-- titulo y boton --}}
    <x-sistem.menus.title-and-btn title="Categorias">
        <x-sistem.buttons.primary-btn 
        title="Agregar" 
        wire:click="createActionModal" 
        wire:loading.attr="disabled">
        <x-sistem.icons.hi-plus-circle/>
    </x-sistem.menus.title-and-btn>
    
    </x-sistem.menus.title-and-btn>

    {{-- input buscador y filtro de activos --}}
    <x-sistem.filter.search-active />

    {{-- listado --}}
    <div class="mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">

            @foreach ($categories as $item)
            <!-- Ejemplo de una tarjeta -->
            {{-- <div class="bg-gray-100 px-6 py-2 rounded-lg shadow-md divide-y-2 divide-gray-400">
                <div>
                    <h2 class="text-lg font-semibold mb-2"><a href="#">{{$item->name}}</a></h2>
                    <p class="text-gray-600 text-sm mb-4 truncate">{{$item->description}}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 mb-2">Estado: {{$item->status ? 'Activo' :
                            'Desabilitado'}}</span>
                        <span class="text-sm text-gray-500 mb-2">ID: {{$item->id}}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 mb-2">Creado: {{$item->user->lastname}},
                            {{$item->user->name}} - {{$item->company->name}}</span>
                    </div>
                </div>
                <div class="flex justify-between mt-2">

                    <x-sistem.buttons.edit-text wire:click="editActionModal({{$item->id}})" wire:loading.attr="disabled"
                        title="{{ __('Editar') }}" />
                    <x-sistem.buttons.delete-text wire:click="openDeleteModal({{$item->id}})"
                        wire:loading.attr="disabled" title="{{ __('Borrar') }}" />
                </div>
            </div> --}}
            <x-page.category-list :item="$item" />
            <!-- Agrega más tarjetas aquí -->

            @endforeach
        </div>
    </div>

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $categories->links() }}
    </div>

    <!-- Modal para borrar -->
    <x-dialog-modal wire:model="showDeleteModal">
        <x-slot name="title">
            {{ __('Borrar') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Desea eliminar el registro?') }}
        </x-slot>

        <x-slot name="footer">
            <x-sistem.buttons.normal-btn wire:click="$set('showDeleteModal', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-sistem.buttons.normal-btn>

            <x-sistem.buttons.delete-btn class="ml-3" wire:click="deleteCategory()" wire:loading.attr="disabled"
                autofocus>
                {{ __('Borrar') }}
            </x-sistem.buttons.delete-btn>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal para crear y editar -->
    <x-dialog-modal wire:model="showActionModal">
        <x-slot name="title">
            {{ __('Agregar') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Agregar un registro') }}

            <form {{-- method="POST" --}} class="grid gap-3 mt-5">

                <x-sistem.forms.label-form for="name" value="{{ __('Nombre de categoria') }}" />
                <x-sistem.forms.input-form id="name" type="name" placeholder="{{ __('Nombre') }}" wire:model="name"
                    autofocus />
                <x-sistem.forms.input-error for="name" />

                <x-sistem.forms.label-form for="description" value="{{ __('Descripcion de categoria') }}" />
                <x-sistem.forms.textarea-form id="description" placeholder="{{ __('Descripcion') }}"
                    wire:model="description" />
                <x-sistem.forms.input-error for="description" />

                <label for="status" class="flex items-center">
                    <x-sistem.forms.checkbox-form id="status" wire:model="status" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Estado') }}</span>
                </label>

            </form>

        </x-slot>

        <x-slot name="footer">
            <x-sistem.buttons.normal-btn wire:click="$set('showActionModal', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-sistem.buttons.normal-btn>

            <x-sistem.buttons.primary-btn wire:click="save" class="ml-3" wire:loading.attr="disabled" autofocus>
                {{ __('Guardar') }}
            </x-sistem.buttons.primary-btn>
        </x-slot>
    </x-dialog-modal>


</div>