<div>
    {{-- Filtros --}}
    <div class="bg-gray-300 py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">                
        <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none">
            <i class="fas fa-list text-xs mr-1"></i> Todos los servicios
        </button>
        
        {{-- Dropdown Categorias --}}
        <div class="relative" x-data="{ open:false }">
            <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                <i class="fas fa-tags text-sm mr-2"></i> 
                Categorias 
                <i class="fas fa-angle-down text-sm ml-2"></i>
            </button>
            <!-- Dropdown Body -->
            <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl overflow-auto h-72" x-show="open" x-on:click.away="open = false">   
                @foreach ($categories as $category)
                    <a wire:click="$set('category_id',{{$category->id}})" x-on:click="open = false" class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white">{{$category->name}}</a>
                @endforeach
            </div>
            <!-- // Dropdown Body -->
        </div>
    </div>
    
    {{-- Services --}}
    <div class="container bg-gray-300 py-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <img class="h-36 w-full object-cover" src="@if($service->image) {{Storage::url($service->image->url)}} @else {{Storage::url('default/service.jpg')}} @endif" alt="">
                    
                    <div class="px-6 py-4">
                        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($service->name, 40, '...')}}</h1>
                        <p class="text-gray-500 text-sm mb-2">{{$service->category->name}}</p>

                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                            </ul>
                            <p class="text-sm text-gray-500 ml-auto">
                                <i class="fas fa-thumbs-up text-blue-400"></i>
                                ({{$service->reactions_count}})
                            </p>
                        </div>

                        <a href="{{route('services.show',$service)}}" class="block text-center w-full mt-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                            Mas Información    
                        </a>
                    </div>

                    
                    
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$services->links()}}
        </div>
    </div>
</div>
