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
        <link rel="stylesheet" href="{{ asset('fortawesome/css/all.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navs.navigation')
            
            {{-- @livewire('navigation-menu') --}}

            <!-- Page Heading -->
            {{--@if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        MiniMaps
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <div class="container py-8">
                <aside>
                    <h1 class="font-bold text-lg text-gray-700 mb-4">Editar el Negocio</h1>
                    
                    <div>   
                        <ul class="flex gap-4 text-sm">
                            <li class="leading-7 border-l-4  @routeIs('owner.shops.edit', $shop) border-indigo-400 pl-1 bg-gradient-to-r from-indigo-100 to-indigo-50 font-bold @else border-transparent @endif">
                                <a href="{{route('owner.shops.edit', $shop)}}">Información del negocio</a>
                            </li>
            
                            <li class="leading-7 border-l-4 @routeIs('owner.shops.location', $shop) border-indigo-400 pl-1 bg-gradient-to-r from-indigo-100 to-indigo-50 font-bold @else border-transparent @endif">
                                <a href="{{route('owner.shops.location', $shop)}}">Ubicación</a>
                            </li>
            
                            <li class="leading-7 border-l-4 border-transparent">
                                <a href="">Redes sociales</a>
                            </li>
            
                            <li class="leading-7 border-l-4 border-transparent">
                                <a href="">Productos Principales</a>
                            </li>
                        </ul>
                    </div>
                    
                </aside>
                <div class="card mt-4">
                    <main class="card-body text-gray-600">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}            
        @endisset

        
        @isset($mapJS)
            {{$mapJS}}            
        @endisset
    </body>
</html>
