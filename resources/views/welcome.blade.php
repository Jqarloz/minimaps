<x-app-layout>
    
    {{-- Slider --}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/home_01.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl text-shadow-black ">Welcome to Minimaps</h1>
                <p class="text-white text-lg mt-2 mb-4 text-shadow-black">Potencia tu negocio! haz que todos los dias personas nuevas lo conoscan.</p>
                <!-- component -->
                <!-- This is an example component -->
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Buscar en Minimaps">
                    <button type="submit" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-12">
        <h1 class="text-gray-600 text-center text-3xl">
            Contenido
        </h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-4 mb-4">            
            <article>
                <a href="{{route('shops.index')}}">
                    <figure>
                        <img class="rounded-xl h-64 w-full object-cover object-center" src="{{asset('img/home/content/shops.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">
                            Negocios
                        </h1>
                    </header>
                </a>
            </article>
            <article>
                <a href="{{route('services.index')}}">
                    <figure>
                        <img class="rounded-xl h-64 w-full object-cover object-center" src="{{asset('img/home/content/services.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">
                            Servicios
                        </h1>
                    </header>
                </a>
            </article>
            <article>
                <a href="{{route('items.index')}}">
                    <figure>
                        <img class="rounded-xl h-64 w-full object-cover object-center" src="{{asset('img/home/content/items.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">
                            Tienda de articulos
                        </h1>
                    </header>
                </a>
            </article>
            <article>
                <a href="{{route('jobs.index')}}">
                    <figure>
                        <img class="rounded-xl h-64 w-full object-cover object-center" src="{{asset('img/home/content/jobs.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">
                            Empleos
                        </h1>
                    </header>
                </a>
            </article>
        </div>
    </section>

    <section class="mt-12 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">
            ¿Tienes dudas de que es Minimaps?
        </h1>
        <p class="text-center text-white">Visita nuestro centro de ayuda rápida. Solo da clic en el boton de Ayuda que se muestra a continuación.</p>
        <div class="flex justify-center mt-4">
            <a href="#" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                Ayuda    
            </a>
        </div>
    </section>

</x-app-layout>