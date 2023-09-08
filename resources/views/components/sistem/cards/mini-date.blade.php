@props(['title', 'href', 'date', 'icon', 'date_total' => false])

<div class="flex justify-start gap-5 items-center p-2 my-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-2 mx-2 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        {{-- <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
            </path>
        </svg> --}}
        {{$slot}}
    </div>
    <div class="flex flex-col justify-between items-start gap-1">
        <a href="{{$href}}" class="mb-2 text-xl font-medium hover:text-gray-800 hover:underline text-gray-600 dark:text-gray-400">
            {{$title}}
        </a>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{$date}} / {{$date_total}}
        </p>
    </div>
</div>