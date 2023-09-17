<div class="w-2/3 mx-auto">
    <p>asd - {{$this->company}}</p>
    <form class="grid gap-3 mt-5">

        <x-sistem.forms.validation-errors class="mb-4" />

        
        <x-sistem.forms.label-form for="name" value="{{ __('Nombre de empresa') }}" />
        <x-sistem.forms.input-form id="name" type="text" placeholder="{{ __('Nombre') }}" wire:model="name"
            autofocus />
        <x-sistem.forms.input-error for="name" />
        
        <x-sistem.forms.label-form for="email" value="{{ __('Email de empresa') }}" />
        <x-sistem.forms.input-form id="email" type="email" placeholder="{{ __('Email') }}" wire:model="email"
            />
        <x-sistem.forms.input-error for="email" />
        
        <x-sistem.forms.label-form for="phone" value="{{ __('Telefono de empresa') }}" />
        <x-sistem.forms.input-form id="phone" type="text" placeholder="{{ __('Telefono') }}" wire:model="phone"
            />
        <x-sistem.forms.input-error for="phone" />
        
        <x-sistem.forms.label-form for="adress" value="{{ __('Direccion de empresa') }}" />
        <x-sistem.forms.input-form id="adress" type="text" placeholder="{{ __('Direccion') }}" wire:model="adress"
            />
        <x-sistem.forms.input-error for="adress" />
        
        <x-sistem.forms.label-form for="city" value="{{ __('Localidad de empresa') }}" />
        <x-sistem.forms.input-form id="city" type="text" placeholder="{{ __('Localidad') }}" wire:model="city"
            />
        <x-sistem.forms.input-error for="city" />

        <x-sistem.forms.label-form for="social" value="{{ __('Redes sociales de empresa') }}" />
        <x-sistem.forms.input-form id="social" type="text" placeholder="{{ __('Redes Sociales') }}" wire:model="social"
            />
        <x-sistem.forms.input-error for="social" />

        
        <x-sistem.forms.label-form for="description" value="{{ __('Descripcion de empresa') }}" />
        <x-sistem.forms.textarea-form id="description" placeholder="{{ __('Descripcion') }}"
            wire:model="description" />
        <x-sistem.forms.input-error for="description" />

        <x-sistem.forms.label-form for="image_nueva" value="{{ __('Imagen de portada') }}" />
        <x-sistem.forms.input-form id="image_nueva" type="file" wire:model="image_nueva" accept="image/*"
             />
        <x-sistem.forms.input-error for="image_nueva" />

        nueva:
        @if ($image_nueva) 
            <img class="w-64" src="{{ $image_nueva->temporaryUrl() }}">
        @endif
        Actual:
        @if ($this->image )
            {{-- $name = {{$this->image}}; --}}
            <img class="w-64" src="{{asset('storage/image/'.$this->image)}}">
        @endif

        <x-sistem.buttons.primary-btn wire:click="save" class="ml-3" wire:loading.attr="disabled" title="Actualizar"/>
    </form>
</div>
