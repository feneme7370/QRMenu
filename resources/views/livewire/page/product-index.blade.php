<div>
    {{-- mensaje de alerta --}}
    <x-sistem.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" />

    {{-- titulo y boton --}}
    <x-sistem.menus.title-and-btn title="Productos">
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


    <x-page.product-table :products="$products" />

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $products->onEachSide(1)->links('pagination::windmill-pagination') }}
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

            <x-sistem.buttons.delete-btn class="ml-3" wire:click="deleteProduct" wire:loading.attr="disabled"
            title="Borrar" autofocus/>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal para crear y editar -->
    <x-dialog-modal wire:model="showActionModal">
        <x-slot name="title">
            {{ __($product ? 'Editar' : 'Agregar') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Colocar datos del producto, su precio y una descripcion para que vea el usuario') }}

            <form {{-- method="POST" --}} class="grid gap-3 mt-5">

                <x-sistem.forms.label-form for="name" value="{{ __('Nombre') }}" />
                <x-sistem.forms.input-form id="name" type="name" placeholder="{{ __('Pizza napolitana, Coca Cola 750ml') }}" wire:model="name"
                    autofocus />
                <x-sistem.forms.input-error for="name" />

                <x-sistem.forms.label-form for="price" value="{{ __('Precio') }}" />
                <x-sistem.forms.input-form id="price" type="number" placeholder="{{ __('Ingresar el precio') }}" wire:model="price"
                    autofocus />
                <x-sistem.forms.input-error for="price" />

                <x-sistem.forms.label-form for="subcategory_id" value="{{ __('Categoria') }}" />
                <x-sistem.forms.select-form wire:model="subcategory_id">
                    @foreach ($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->name}} - {{$subcategory->category->name}}</option>
                    @endforeach
                </x-sistem.forms.select-form>
                <x-sistem.forms.input-error for="subcategory_id" />
                
                <x-sistem.forms.label-form for="description" value="{{ __('Descripcion') }}" />
                <x-sistem.forms.textarea-form id="description" placeholder="{{ __('Incluye tomate, ajo, perejil y salsa') }}"
                    wire:model="description" />
                <x-sistem.forms.input-error for="description" />
                
                <label for="status" class="flex items-center">
                    <x-sistem.forms.checkbox-form id="status" wire:model="status" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Estado') }}</span>
                </label>

                <x-sistem.notifications.alerts-input :messageErrorInput="session('messageErrorInput')" />
            </form>

        </x-slot>

        <x-slot name="footer">
            <x-sistem.buttons.normal-btn wire:click="$set('showActionModal', false)" wire:loading.attr="disabled" title="Cancelar" />

            <x-sistem.buttons.primary-btn wire:click="save" class="ml-3" wire:loading.attr="disabled" title="{{$product ? 'Actualizar' : 'Guardar'}}" autofocus />
        </x-slot>
    </x-dialog-modal>


</div>