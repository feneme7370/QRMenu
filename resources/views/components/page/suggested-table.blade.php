<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">ID</th>
            <th class="px-4 py-3">Producto</th>
            <th class="px-4 py-3">Estado</th>
            <th class="px-4 py-3">Actiones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

            @foreach ($suggesteds as $item)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{$item->id}}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">

                  <!-- Avatar with inset shadow -->
                  {{-- <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy">
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div> --}}

                  <div>
                    <p class="font-semibold">{{$item->name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      {{$item->user->name}}
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-xs">
                <span class="px-2 py-1 font-semibold leading-tight {{$item->product->status == '1' ? 'text-green-700 bg-green-100 dark:text-green-100 dark:bg-green-700' : 'text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700'}}   rounded-full  ">
                  {{$item->product->status == '1' ? 'Activo' : 'Inactivo'}}
                </span>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <x-sistem.buttons.delete-text wire:click="deleteSuggested({{$item->id}})"
                    wire:loading.attr="disabled" />
                </div>
              </td>
            </tr>
            @endforeach

        </tbody>
      </table>
    </div>
  </div>