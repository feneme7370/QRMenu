<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link href="{{ asset('lib/toastr/toastr.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script> 
        <script src="{{ asset('lib/toastr/toastr.min.js') }}"></script> --}}


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans" x-data="data()">
        <x-banner />

        {{-- <div class="min-h-screen bg-gray-100"> --}}

            {{-- @livewire('navigation-menu') --}}
            @include('layouts.sidebarFlowtrail')

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}
            <div class="w-full">
                <div class="max-w-7xl mx-auto p-1 sm:px-6 lg:px-8">
                    <div class="bg-white mt-12 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <!-- Page Content -->
                            <main>
                                {{ $slot }}
                            </main>
                        </div>
                    </div>
                    @include('layouts.footer-basic')
                </div>
            </div>

        </div>



        @stack('modals')
        
        @livewireScripts
        <script src="{{asset('public/assets/js/focus-trap.js')}}"></script>
        <script src="{{asset('public/assets/js/init-alpine.js')}}"></script>

    </body>
</html>
