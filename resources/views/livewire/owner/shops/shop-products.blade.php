<section>
    <h1 class="text-2xl font-bold">Catalogo del negocio</h1>
    <hr class="mb-6 mt-2">

    <div>
        {{-- Productos Principales --}}
        <div class="col-span-2">
            <section class="mt-4">
                <article class="mb-4 shadow" x-data="{ open: true }">
                    <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200 flex" x-on:click="open = !open">
                        <template x-if="open">
                            <i class="fas fa-chevron-right font-bold text-lg"></i>
                        </template>
                        <template x-if="!open">
                            <i class="fas fa-chevron-down font-bold text-lg"></i>
                        </template>
                        <h1 class="font-bold text-lg text-gray-800 ml-4">Catálogo</h1>
                    </header>
                    <div class="bg-gray-200 py-2 px-4" x-show="open">
                        <div>
                            <div class="w-full py-2 px-2 bg-gray-50 border rounded-md mb-4">
                                <div class="grid grid-cols-4 justify-center content-center mb-1">
                                    <div class="col-span-1">
                                        <p class="font-bold text-gray-600 text-sm grid justify-center">Imagen</p>
                                    </div>
                                    <div class="col-span-2">
                                        <p class="font-bold text-gray-600 text-sm">Nombre</p>
                                    </div>
                                    <div class="col-span-1 grid justify-center">
                                        <p class="font-bold text-gray-600 text-sm">Acciones</p>
                                    </div>
                                </div>
                                <hr class="mb-2">
                                @foreach ($shop->products as $item)
                                    <div class="grid grid-cols-4 justify-center content-center mb-1 {{($loop->iteration%2) == 0 ? 'bg-gray-100' : 'bg-gray-200'}}">
                                        <div class="grid col-span-1 justify-center content-center">
                                            <img class="py-2 w-4/6 object-contain justify-center" src="@if($item->image) {{Storage::url($item->image)}} @else {{Storage::url('default/products.jpg')}} @endif" alt="">
                                        </div>
                                        <div class="col-span-2 grid content-center justify-start">
                                            <h1 class="font-bold text-lg">{{$item->name}}</h1>
                                        </div>
                                        <div class="col-span-1 grid justify-center content-center">
                                            <div class="flex">
                                                <i class="fas fa-edit text-blue-500 cursor-pointer text-2xl p-2" wire:click="edit({{$item}})" onclick="editUp()" title="Editar"></i>
                                                <i class="fas fa-trash text-red-500 cursor-pointer text-2xl p-2" wire:click="destroy({{$item}})" title="Eliminar"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="grid">
                                {{-- Modal Editar --}}
                                @if ($editProduct == true)
                                    <div class="form-modal">
                                        <form wire:submit.prevent="update">
                                            <div class="card" x-on:click.away="$wire.set('editProduct', false)">
                                                    <div class="card-body">
                                                        <div class="mb-1 mt-2">
                                                            <div class="grid justify-items-center items-center">
                                                                @if ($product->image)
                                                                    <img class="h-28 w-auto object-cover" id="picture" src="{{Storage::url($product->image)}}" alt="">
                                                                @else
                                                                    <img class="h-28 w-auto object-cover" id="picture" src="{{Storage::url('default/products.jpg')}}" alt="">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                                <input type="file" id="file" accept="image/x-png,image/gif,image/jpeg" class="form-input">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="ml-2 text-xs">Nombre del Producto:</label>
                                                            <input type="text" class="form-input" wire:model="product.name" id="name">
                                                        </div>
                                                        <div class="mb-2 hidden">
                                                            <label class="ml-2 text-xs">Slug:</label>
                                                            <input type="text" class="form-input" wire:model="product.slug" id="slug">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="ml-2 text-xs">Precio ($):</label>
                                                            <input type="number" step="0.01" class="form-input" wire:model="product.price">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="ml-2 text-xs">Descripción:</label>
                                                            <textarea class="form-input" wire:model="product.description" cols="30" rows="3"></textarea>
                                                        </div>
                                                        <div class="grid items-center justify-items-center">
                                                            <button class="btn btn-sucess">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            </section> 
        </div> 
    </div>
    <x-slot name="js_lw">
        <script src="{{asset('js/owner/shops/form_lw.js')}}">
        </script>
    </x-slot>
</section>