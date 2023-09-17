<div>
    {{-- mensaje de alerta --}}
    <x-sistem.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" />

    {{-- titulo y boton --}}
    <x-sistem.menus.title-and-btn title="Destacados">
        <div></div>
    </x-sistem.menus.title-and-btn>

    {{-- input buscador y filtro de activos --}}
    {{-- <x-sistem.filter.search-active /> --}}
    <div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-end mb-5">
        <form {{-- method="POST" --}} class="grid gap-3 mt-5 w-full md:w-1/2">

            <x-sistem.forms.label-form for="product_id" value="{{ __('Listado de productos') }}" />
            <x-sistem.forms.select-form wire:model="product_id">
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </x-sistem.forms.select-form>
            <x-sistem.forms.input-error for="product_id" />

        </form>
        <x-sistem.buttons.primary-btn
        title="Agregar"
        wire:click="save" 
        wire:loading.attr="disabled" 
        autofocus>
        @slot('icon')
            <x-sistem.icons.hi-plus-circle/>
        @endslot
        </x-sistem.buttons.primary-btn>
    </div>

    {{-- listado --}}
    <x-page.suggested-table :suggesteds="$suggesteds" />

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $suggesteds->onEachSide(1)->links('pagination::windmill-pagination') }}
    </div>

    <!-- Modal para borrar -->
    {{-- <x-dialog-modal wire:model="showDeleteModal">
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
    </x-dialog-modal> --}}

    <!-- Modal para crear -->
    {{-- <x-dialog-modal wire:model="showActionModal">
        <x-slot name="title">
            {{ __('Agregar') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Agregar un registro') }}

            <form wire:submit="save" class="grid gap-3 mt-5">

                <x-sistem.forms.label-form for="suggested_id" value="{{ __('Destacado') }}" />
                <x-sistem.forms.select-form wire:model="suggested_id">
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </x-sistem.forms.select-form>
                <x-sistem.forms.input-error for="suggested_id" />

            </form>

        </x-slot>

        <x-slot name="footer">
            <x-sistem.buttons.normal-btn wire:click="$set('showActionModal', false)" wire:loading.attr="disabled" title="Cancelar" />

            <x-sistem.buttons.primary-btn type="submit" class="ml-3" wire:loading.attr="disabled" title="Guardar" autofocus/>
        </x-slot>
    </x-dialog-modal> --}}


</div>