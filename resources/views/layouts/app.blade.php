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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen bg-gray-100">
            <!-- Sidebar -->
            <livewire:sidebar />
            
            <!-- Contenido principal -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header superior -->
                <header class="bg-white shadow-sm border-b border-gray-200">
                    <div class="flex items-center justify-between px-6 py-4">
                        <!-- Botón hamburguesa para móvil -->
                        <button @click="$dispatch('toggle-sidebar')" class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        
                        @if (isset($header))
                            <div class="hidden lg:block">
                                {{ $header }}
                            </div>
                        @endif
                        
                        <!-- Información del usuario en el header -->
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">Bienvenido, {{ Auth::user()->name }}</span>
                            <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                                <span class="text-sm font-medium text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Contenido de la página -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                    <div class="container mx-auto px-6 py-8">
                        {{ $slot ?? '' }}
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
