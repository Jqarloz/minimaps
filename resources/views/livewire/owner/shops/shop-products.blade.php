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
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4 mt-4">
                                @foreach ($shop->products as $item)
                                    <article class="card">
                                        <img class="h-44 w-full object-cover" src="@if($item->image) {{Storage::url($item->image)}} @else {{Storage::url('default/products.jpg')}} @endif" alt="">
                                        <div class="card-body h-44">
                                            <h1 class="card-tittle">{{$item->name}}</h1>
                                            <p class="text-gray-500 text-sm mb-2">${{$item->price}}</p>
                                        </div>
                                        <div class="flex justify-around content-end mb-3">
                                            <i class="fas fa-edit text-blue-500 cursor-pointer text-2xl p-2" wire:click="edit({{$item}})" onclick="editUp()" title="Editar"></i>
                                            <i class="fas fa-trash text-red-500 cursor-pointer text-2xl p-2" wire:click="destroy({{$item}})" title="Eliminar"></i>
                                        </div>
                                    </article>
                                @endforeach
                                {{-- Modal Editar --}}
                                @if ($editProduct == true)
                                    <div class="form-modal overflow-scroll">
                                        <form wire:submit.prevent="update">
                                            <article class="card px-4 mt-4 mb-4" x-on:click.away="$wire.set('editProduct', false)">
                                                    <div class="mt-4 flex">
                                                        @if ($product->image)
                                                            <img class="h-44 w-full object-cover" id="picture" src="{{Storage::url($product->image)}}" alt="">
                                                        @else
                                                            <img class="h-44 w-full object-cover" id="picture" src="{{Storage::url('default/products.jpg')}}" alt="">
                                                        @endif
                                                    </div>
                                                    <input type="file" id="file" accept="image/x-png,image/gif,image/jpeg" class="form-input">
                                                <div class="card-body">
                                                    <div class="mb-2">
                                                        <label class="ml-2 text-xs">Nombre del Producto:</label>
                                                        <input type="text" class="form-input" wire:model="product.name" id="name">
                                                    </div>
                                                    <div class="mb-2">
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
                                                    <button class="btn btn-sucess">Guardar</button>
                                                </div>
                                            </article>
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