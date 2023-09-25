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
            @slot('icon')
                <x-sistem.icons.hi-plus-circle/>
            @endslot    
        </x-sistem.buttons.primary-btn>

    </x-sistem.menus.title-and-btn>

    {{-- input buscador y filtro de activos --}}
    <x-sistem.filter.search-active />

    {{-- listado --}}

    <x-page.category-table :categories="$categories" />

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $categories->onEachSide(1)->links('pagination::windmill-pagination') }}
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
            <x-sistem.buttons.normal-btn wire:click="$set('showDeleteModal', false)" wire:loading.attr="disabled" title="Cancelar" />

            <x-sistem.buttons.delete-btn class="ml-3" wire:click="deleteCategory" wire:loading.attr="disabled"
            title="Borrar" autofocus/>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal para crear y editar -->
    <x-dialog-modal wire:model="showActionModal">
        <x-slot name="title">
            {{ __($category ? 'Editar' : 'Agregar') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Agregue un nombre y una descripcion para la categoria') }}

            <form class="grid gap-3 mt-5">

                <div class="grid md:grid-cols-1 gap-3">
                    <div>
                        <x-sistem.forms.label-form for="name" value="{{ __('Nombre de categoria') }}" />
                        <x-sistem.forms.input-form id="name" type="name" placeholder="{{ __('Comidas, Bebidas, Etc.') }}" wire:model="name"
                            autofocus />
                        <x-sistem.forms.input-error for="name" />
                    </div>
    
                    <div>
                        <x-sistem.forms.label-form for="description" value="{{ __('Descripcion') }}" />
                        <x-sistem.forms.textarea-form id="description" placeholder="{{ __('Comidas de todas las variedades, platos elaborados o para compartir entre amigos') }}"
                            wire:model="description" />
                        <x-sistem.forms.input-error for="description" />
                    </div>
                </div>

                <label for="status" class="flex items-center">
                    <x-sistem.forms.checkbox-form id="status" wire:model="status" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Estado') }}</span>
                </label>

            </form>

        </x-slot>

        <x-slot name="footer">
            <x-sistem.buttons.normal-btn wire:click="$set('showActionModal', false)" wire:loading.attr="disabled" title="Cancelar" />

            <x-sistem.buttons.primary-btn wire:click="save" class="ml-3" wire:loading.attr="disabled" title="{{$category ? 'Actualizar' : 'Guardar'}}" autofocus/>
        </x-slot>
    </x-dialog-modal>

</div>