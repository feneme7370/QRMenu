<div class="w-5/6 mx-auto">
    
    <form class="grid grid-cols-1 gap-3 mt-5">

        <div class="grid md:grid-cols-2 gap-3">

            <div>
                <x-sistem.forms.label-form for="name" value="{{ __('Nombre de empresa') }}" />
                <x-sistem.forms.input-form id="name" type="text" placeholder="{{ __('Nombre') }}" wire:model="name"
                    autofocus />
                <x-sistem.forms.input-error for="name" />
            </div>
            
            <div>
                <x-sistem.forms.label-form for="email" value="{{ __('Email de empresa') }}" />
                <x-sistem.forms.input-form id="email" type="email" placeholder="{{ __('Email') }}" wire:model="email"
                    />
                <x-sistem.forms.input-error for="email" />
            </div>
            
            <div>
                <x-sistem.forms.label-form for="phone" value="{{ __('Telefono de empresa') }}" />
                <x-sistem.forms.input-form id="phone" type="text" placeholder="{{ __('Telefono') }}" wire:model="phone"
                    />
                <x-sistem.forms.input-error for="phone" />
            </div>
            
            <div>
                <x-sistem.forms.label-form for="adress" value="{{ __('Direccion de empresa') }}" />
                <x-sistem.forms.input-form id="adress" type="text" placeholder="{{ __('Direccion') }}" wire:model="adress"
                    />
                <x-sistem.forms.input-error for="adress" />
            </div>
            
            <div>
                <x-sistem.forms.label-form for="city" value="{{ __('Localidad de empresa') }}" />
                <x-sistem.forms.input-form id="city" type="text" placeholder="{{ __('Localidad') }}" wire:model="city"
                    />
                <x-sistem.forms.input-error for="city" />
            </div>
    
            <div>
                <x-sistem.forms.label-form for="social" value="{{ __('Redes sociales de empresa') }}" />
                <x-sistem.forms.input-form id="social" type="text" placeholder="{{ __('Redes Sociales') }}" wire:model="social"
                    />
                <x-sistem.forms.input-error for="social" />
            </div>
        </div>

        <div>
            <x-sistem.forms.label-form for="image_nueva" value="{{ __('Imagen de portada') }}" />
            <x-sistem.forms.input-form id="image_nueva" type="file" wire:model="image_nueva" accept="image/*"
                 />
            <x-sistem.forms.input-error for="image_nueva" />
        </div>

        {{-- <div>
            Portada actual:
            @if ($this->image )
                <img class="w-64" src="{{asset('storage/portada/'.$this->image)}}">
            @else
                <img class="w-64" src="{{asset('storage/sistem/withoutImage.jpg')}}">
            @endif
        </div>
        <div>
            <p wire:loading>Cargando</p>
            Portada nueva:
            @if ($image_nueva) 
                <img class="w-64" src="{{ $image_nueva->temporaryUrl() }}">
            @endif
        </div> --}}
        <div class="flex flex-col items-center md:flex-row gap-10 md:justify-evenly mb-4">
            <div class="w-64 h-64 relative">
                <p class="mb-2">Imagen actual:</p>
                @if ($this->image && $this->image != '')
                    <img src="{{asset('storage/portada/'.$this->image)}}" alt="imagen" class="w-64 h-64 object-cover rounded-sm" />
                @else
                    <img class="w-64 h-64 object-cover rounded-sm" src="{{asset('storage/sistem/withoutImage.jpg')}}">
                @endif
                <button wire:click='deleteImageEdit' type="button" class="absolute top-7 right-2 p-2 bg-red-600 rounded-lg text-white">Eliminar</button>
            </div>
            <div class="w-64 h-64 relative">
                <p wire:loading>Cargando</p>
                <p class="mb-2">Imagen nueva:</p>
                @if ($image_nueva) 
                    <img class="w-64 h-64 object-cover rounded-sm" src="{{ $image_nueva->temporaryUrl() }}">
                @endif
            </div>
        </div>

        <div>
            <x-sistem.forms.label-form for="description" value="{{ __('Descripcion de empresa') }}" />
            <x-sistem.forms.textarea-form id="description" placeholder="{{ __('Descripcion') }}"
                wire:model="description" />
            <x-sistem.forms.input-error for="description" />
        </div>

        <x-sistem.buttons.primary-btn wire:click="save" class="ml-3 mx-auto" wire:loading.attr="disabled" wire:loading.class="opacity-50" title="Actualizar"/>
    </form>
</div>
