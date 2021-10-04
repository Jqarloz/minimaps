<section>

    <h1 class="text-2xl font-bold">Contacto del negocio</h1>
    <hr class="mb-6 mt-2">

    <div>
        {{-- Contactos--}}
        <section class="mt-4">
            <article class="mb-4 shadow" x-data="{ open: true }">
                <header class="border border-gray-400 rounded-t px-4 py-2 cursor-pointer bg-gray-400 flex" x-on:click="open = !open">
                    <template x-if="open">
                        <i class="fas fa-chevron-right font-bold text-lg"></i>
                    </template>
                    <template x-if="!open">
                        <i class="fas fa-chevron-down font-bold text-lg"></i>
                    </template>
                    <h1 class="font-bold text-lg text-white ml-4">Contacto</h1>
                </header>
                <div class="bg-white py-2 px-4" x-show="open">
                    @if ($shop->contacts)
                        @foreach ($shop->contacts as $contacto)
                            @if ($contact->id == $contacto->id)
                                <form wire:submit.prevent="update">
                                    <div class="flex justify-between object-center content-center border rounded-md border-gray-600 shadow py-2 px-2">
                                        <div class="gap-4 flex justify-between">
                                            <div class="w-36">
                                                <label class="text-xs col-span-1 ml-2">Tipo:</label>
                                                <select wire:model="contact.type" class="form-input">
                                                    <option value=""></option>
                                                    <option value="movil">Movil</option>
                                                    <option value="email">Email</option>
                                                    <option value="phone">Telefono</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="text-xs col-span-1 ml-2">Contacto:</label>
                                                <input type="text" wire:model="contact.name" class="form-input">
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap content-center">
                                            <button type="submit" class="btn btn-sucess">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="flex justify-between py-1">
                                    <div class="flex justify-between gap-4 items-center">
                                        @switch($contacto->type)
                                            @case('movil')
                                                <i class="fab fa-whatsapp text-green-500 text-lg"></i> 
                                                @break
                                            @case('email')
                                                <i class="fas fa-envelope text-red-500 text-lg"></i>
                                                @break
                                            @case('phone')
                                                <i class="fas fa-phone-square-alt text-green-800 text-lg"></i>
                                                @break
                                            @default
                                                <i class="far fa-address-book text-indigo-800 text-lg"></i>
                                        @endswitch
                                        <h1 class="text-lg">{{$contacto->name}}</h1>
                                    </div>
                                    <div>
                                        <i class="fas fa-edit text-blue-500 cursor-pointer text-lg" wire:click="edit({{$contacto}})" title="Editar"></i>
                                        <i class="fas fa-trash text-red-500 cursor-pointer text-lg" wire:click="destroy({{$contacto}})" title="Eliminar"></i>
                                    </div>
                                </div>
                            @endif
                            
                        @endforeach
                    @endif
                    
                    @if ($newSocial == true)
                        <form wire:submit.prevent="store">
                            <div class="flex justify-between object-center content-center border rounded-md border-gray-600 shadow py-2 px-2">
                                <div class="gap-4 flex justify-between">
                                    <div class="w-36">
                                        <label class="text-xs col-span-1 ml-2">Tipo:</label>
                                        <select wire:model="typeNew" class="form-input">
                                            <option value=""></option>
                                            <option value="movil">Movil</option>
                                            <option value="email">Email</option>
                                            <option value="phone">Telefono</option>
                                        </select>
                                        @error('typeNew')
                                            <span class="text-xs text-red-500">{{$message}}</span>   
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-xs col-span-1 ml-2">Contacto:</label>
                                        <input type="text" wire:model="nameNew" class="form-input">
                                        
                                        @error('nameNew')
                                            <span class="text-xs text-red-500">{{$message}}</span>   
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap content-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    
                    <div class="flex justify-end mt-4">
                        <button class="btn btn-sucess" wire:click="create">Agregar <i class="fas fa-plus-square ml-2"></i></button>
                    </div>
                </div>
            </article>
        </section>
    
        {{-- Redes Sociales --}}
        <section class="mt-4">
            @livewire('owner.shops.shop-network', ['shop' => $shop], key('shop-network' . $shop->id))
        </section>
    </div>

</section>
