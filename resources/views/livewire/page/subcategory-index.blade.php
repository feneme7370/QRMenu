<div>
    {{-- mensaje de alerta --}}
    <x-sistem.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" />

    {{-- titulo y boton --}}
    <x-sistem.menus.title-and-btn title="Subcategorias">
        <x-sistem.buttons.primary-btn 
            title="Agregar" 
            wire:click="createActionModal" 
            wire:loading.attr="disabled" >
            @slot('icon')
                <x-sistem.icons.hi-plus-circle/>
            @endslot
        </x-sistem.buttons.primary-btn>
    </x-sistem.menus.title-and-btn>

    {{-- input buscador y filtro de activos --}}
    <x-sistem.filter.search-active />

    {{-- listado --}}
 

    <x-page.subcategory-table :subcategories="$subcategories" />

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $subcategories->onEachSide(1)->links('pagination::windmill-pagination') }}
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

            <x-sistem.buttons.delete-btn class="ml-3" wire:click="deleteSubcategory" wire:loading.attr="disabled"
            title="Borrar" autofocus/>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal para crear y editar -->
    <x-dialog-modal wire:model="showActionModal">
        <x-slot name="title">
            {{ __($subcategory ? 'Editar' : 'Agregar') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Agregar un registro') }}

            <form {{-- method="POST" --}} class="grid gap-3 mt-5">

                <div class="grid md:grid-cols-2 gap-3">
                    <div>
                        <x-sistem.forms.label-form for="name" value="{{ __('Nombre') }}" />
                        <x-sistem.forms.input-form id="name" type="name" placeholder="{{ __('Pizzas, Gaseosas, Vinos, Etc.') }}" wire:model="name"
                            autofocus />
                        <x-sistem.forms.input-error for="name" />
                    </div>
    
                    <div>
                        <x-sistem.forms.label-form for="category_id" value="{{ __('Categoria') }}" />
                        <x-sistem.forms.select-form wire:model="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </x-sistem.forms.select-form>
                        <x-sistem.forms.input-error for="category_id" />
                    </div>
                    
                </div>
                
                <div>
                    <x-sistem.forms.label-form for="description" value="{{ __('Descripcion') }}" />
                    <x-sistem.forms.textarea-form id="description" placeholder="{{ __('Pizzas de todas las variedades') }}"
                        wire:model="description" />
                    <x-sistem.forms.input-error for="description" />
                </div>

                <label for="status" class="flex items-center">
                    <x-sistem.forms.checkbox-form id="status" wire:model="status" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Estado') }}</span>
                </label>

            </form>

        </x-slot>

        <x-slot name="footer">
            <x-sistem.buttons.normal-btn wire:click="$set('showActionModal', false)" wire:loading.attr="disabled" title="Cancelar" />

            <x-sistem.buttons.primary-btn wire:click="save" class="ml-3" wire:loading.attr="disabled" title="{{$subcategory ? 'Actualizar' : 'Guardar'}}" autofocus/>
        </x-slot>
    </x-dialog-modal>


</div>