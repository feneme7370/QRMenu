<x-app-layout>

    {{-- titulo y boton --}}
    <x-sistem.menus.title-and-btn title="Bienvenido {{auth()->user()->name}}">
        <span>{{auth()->user()->company->name}}</span>
    </x-sistem.menus.title-and-btn>

    <div class="w-full md:w-96 h-64 mx-auto mb-5 bg-gray-200 relative">
        @if (auth()->user()->company->image)
            <img src="{{asset('storage/portada/'.auth()->user()->company->image)}}" alt="imagen portada" class="w-full h-full object-cover rounded-sm" />
        @else
            <img class="w-full h-full object-cover rounded-sm" src="{{asset('storage/sistem/withoutImage.jpg')}}">
        @endif
        <p class="absolute top-0 right-0 p-2 bg-black text-white">Portada</p>
    </div>
      
    <div class="grid gap-3 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <x-sistem.cards.mini-date                     
            href="{{route('categories.index')}}"
            title="Categorias" 
            :date_total="auth()->user()->company->membership->category"
            :date="$categories"
        >
            <x-sistem.icons.hi-queue-list/>
        </x-sistem.cards.mini-date>
        <x-sistem.cards.mini-date 
            href="{{route('subcategories.index')}}" 
            title="Subategorias"
            :date_total="auth()->user()->company->membership->subcategory" 
            :date="$subcategories"
        >
            <x-sistem.icons.hi-list-bullet/>
        </x-sistem.cards.mini-date>

        <x-sistem.cards.mini-date 
            href="{{route('products.index')}}" 
            title="Productos" 
            :date_total="auth()->user()->company->membership->product" 
            :date="$products"
        >
            <x-sistem.icons.hi-briefcase/>
        </x-sistem.cards.mini-date>

        <x-sistem.cards.mini-date 
            href="{{route('suggesteds.index')}}" 
            title="Destacados" 
            :date_total="auth()->user()->company->membership->suggested" 
            :date="$suggested"
        >
            <x-sistem.icons.hi-star/>
        </x-sistem.cards.mini-date>

        @if (auth()->user()->role_id == 1)
        <x-sistem.cards.mini-date 
            href="{{route('companies.index')}}" 
            title="Empresas"
            :date="$companies"
        >
            <x-sistem.icons.hi-building-office/>
        </x-sistem.cards.mini-date>

        <x-sistem.cards.mini-date 
            href="{{route('users.index')}}" 
            title="Usuarios" 
            :date="$users"
        >
            <x-sistem.icons.hi-users/>
        </x-sistem.cards.mini-date>
        @endif
    </div>

</x-app-layout>
