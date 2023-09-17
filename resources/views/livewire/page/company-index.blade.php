<div>
    {{-- mensaje de alerta --}}
    <x-sistem.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" />

    {{-- titulo y boton --}}
    <x-sistem.menus.title-and-btn title="Empresas">
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
    <div class="mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">

            @foreach ($companies as $item)
            <!-- Ejemplo de una tarjeta -->

                <x-page.company-list :item="$item" />

            <!-- Agrega más tarjetas aquí -->

            @endforeach
        </div>
    </div>

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $companies->onEachSide(1)->links('pagination::windmill-pagination') }}
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

            <x-sistem.buttons.delete-btn class="ml-3" wire:click="deleteCompany()" wire:loading.attr="disabled"
            title="Borrar" autofocus/>
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

                <x-sistem.forms.label-form for="name" value="{{ __('Nombre de empresa') }}" />
                <x-sistem.forms.input-form id="name" type="text" placeholder="{{ __('Nombre') }}" wire:model="name"
                    autofocus />
                <x-sistem.forms.input-error for="name" />
                
                <x-sistem.forms.label-form for="email" value="{{ __('Email de empresa') }}" />
                <x-sistem.forms.input-form id="email" type="email" placeholder="{{ __('Email') }}" wire:model="email"
                    autofocus />
                <x-sistem.forms.input-error for="email" />
                
                <x-sistem.forms.label-form for="phone" value="{{ __('Telefono de empresa') }}" />
                <x-sistem.forms.input-form id="phone" type="text" placeholder="{{ __('Telefono') }}" wire:model="phone"
                    autofocus />
                <x-sistem.forms.input-error for="phone" />
                
                <x-sistem.forms.label-form for="adress" value="{{ __('Direccion de empresa') }}" />
                <x-sistem.forms.input-form id="adress" type="text" placeholder="{{ __('Direccion') }}" wire:model="adress"
                    autofocus />
                <x-sistem.forms.input-error for="adress" />
                
                <x-sistem.forms.label-form for="city" value="{{ __('Localidad de empresa') }}" />
                <x-sistem.forms.input-form id="city" type="text" placeholder="{{ __('Localidad') }}" wire:model="city"
                    autofocus />
                <x-sistem.forms.input-error for="city" />

                <x-sistem.forms.label-form for="social" value="{{ __('Redes sociales de empresa') }}" />
                <x-sistem.forms.input-form id="social" type="text" placeholder="{{ __('Redes Sociales') }}" wire:model="social"
                    autofocus />
                <x-sistem.forms.input-error for="social" />

                <x-sistem.forms.label-form for="membership_id" value="{{ __('Membresia') }}" />
                <x-sistem.forms.select-form wire:model="membership_id">
                    @foreach ($memberships as $membership)
                        <option value="{{$membership->id}}">{{$membership->name}}</option>
                    @endforeach
                </x-sistem.forms.select-form>
                <x-sistem.forms.input-error for="membership_id" />
                
                <x-sistem.forms.label-form for="description" value="{{ __('Descripcion de empresa') }}" />
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
            <x-sistem.buttons.normal-btn wire:click="$set('showActionModal', false)" wire:loading.attr="disabled" title="Cancelar" />>
            <x-sistem.buttons.primary-btn wire:click="save" class="ml-3" wire:loading.attr="disabled" title="Guardar" autofocus />
        </x-slot>
    </x-dialog-modal>


</div>