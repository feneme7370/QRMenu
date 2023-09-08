<div class="flex justify-between flex-col md:flex-row mb-5 gap-4">
    <div class="w-full">
        <x-sistem.forms.input-form 
            wire:model.live="search" 
            type="search" 
            placeholder="Buscar" 
            class="w-full" />
    </div>
    <div class="mr-2 flex gap-2 items-center md:justify-end w-full">
        <x-sistem.forms.checkbox-form type="checkbox" class="" wire:model.live="active" />Activos
    </div>
</div>