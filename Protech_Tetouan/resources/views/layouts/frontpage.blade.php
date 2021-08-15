<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @trixassets
        @livewireStyles
        
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
                <a class="flex items-center w-20 mb-4 font-medium text-gray-900 title-font md:mb-0" href="#">
                  <img  src="{{ asset('storage/img/logo.png') }}" />
                </a>
             
            </div>
            <main>
                {{ $slot }}
                
            </main>
        </div>
        
        @stack('modals')

        @livewireScripts
    </body>
</html>
