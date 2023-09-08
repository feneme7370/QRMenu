<div class="flex justify-between flex-col md:flex-row mb-5 gap-2">
    <div class="w-full">
        <x-sistem.forms.input-form 
            wire:model.debounce.1000ms="search" 
            type="search" 
            placeholder="Search" 
            class="w-full" />
    </div>
    
    <div class="mr-2 flex gap-2 items-center md:justify-end w-full">
        <x-sistem.forms.checkbox-form type="checkbox" class="" wire:model="suggested" />Destacados
    </div>

    <div class="mr-2 flex gap-2 items-center md:justify-end w-full">
        <x-sistem.forms.checkbox-form type="checkbox" class="" wire:model="active" />Activos
    </div>
</div>