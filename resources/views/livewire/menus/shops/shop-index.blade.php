<div>
    <div class="bg-gray-300 py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">                
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none">
                <i class="fas fa-list text-xs mr-1"></i> Todos los negocios
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

    {{-- SHOPS --}}
    <div class="container bg-gray-300 py-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($shops as $shop)
                <x-menus.cards :shop="$shop" />
            @endforeach
        </div>

        <div class="mt-4">
            {{$shops->links()}}
        </div>
    </div>
</div>
