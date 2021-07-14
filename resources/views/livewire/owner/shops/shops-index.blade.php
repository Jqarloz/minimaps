<div class="container py-8">
    
    <x-table-responsive>

        {{-- Buscador --}}
        {{-- <div class="px-6 py-4">
            <input class="form-control shadow-sm" placeholder="Buscar un negocio ...">
        </div> --}}
        <div class="px-6 py-4 flex items-center">
            <x-jet-input wire:keydown="limpiar_page" wire:model="search" class="flex-1" placeholder="Buscar un negocio ..." type="text">
            </x-jet-input>
            <a href="{{route('owner.shops.create')}}" class="ml-8 btn btn-danger">Crear Negocio</a>
        </div>

        @if ($shops->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Me gusta
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Calificación
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estatus
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($shops as $shop)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                @isset($shop->image)
                                    <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($shop->image->url)}}" alt="">
                                @else
                                    <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url('default/shop.jpg')}}" alt="">
                                @endisset
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$shop->name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{$shop->category->name}}
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$shop->reactions->count()}}</div>
                                <div class="text-sm text-gray-500">Me gusta</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    {{$shop->rating}}
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración del negocio</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($shop->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                            Revisión
                                        </span>
                                        @break
                                    @default
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Otro
                                        </span>
                                @endswitch

                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('owner.shops.edit', $shop)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="px-6 py-4">
                {{$shops->links()}}
            </div>
        @else
            <div class="px-6 py-4">
                No hay registros que coincidan con la busqueda.
            </div>
        @endif
    </x-table-responsive>
</div>
