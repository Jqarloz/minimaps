<article class="mb-4 shadow" x-data="{ open: true }">
    <header class="border border-gray-400 rounded-t px-4 py-2 cursor-pointer bg-gray-400 flex" x-on:click="open = !open">
        <template x-if="open">
            <i class="fas fa-chevron-right font-bold text-lg"></i>
        </template>
        <template x-if="!open">
            <i class="fas fa-chevron-down font-bold text-lg"></i>
        </template>
        <h1 class="font-bold text-lg text-white ml-4">Redes Sociales</h1>
    </header>
    <div class="bg-white py-2 px-4" x-show="open">
        @if ($shop->networks)
            @foreach ($shop->networks as $net)
                @if ($network->id == $net->id)
                    <form wire:submit.prevent="update">
                        <div class="flex justify-around	 object-center gap-2 content-center border rounded-md border-gray-600 shadow py-2 px-2">
                            <div class="gap-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                <div class="col-span-2 md:col-span-2 md:grid-flow-col lg:col-span-1">
                                    <label class="text-xs ml-2">Tipo:</label>
                                    <select wire:model="network.type" wire:change="changeSelect" class="form-input">
                                        <option value=""></option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="tiktok">TikTok</option>
                                        <option value="linkedin">LinkedIn</option>
                                        <option value="youtube">YouTube</option>
                                    </select>
                                </div>
                                <div class="col-span-2 md:col-span-1 md:grid-flow-col lg:col-span-1">
                                    <label class="text-xs ml-2">HOST:</label>
                                    <input type="text" wire:model="urlHost" class="form-input-disable" readonly>
                                </div>
                                <div class="col-span-2 md:col-span-2 md:grid-flow-col lg:col-span-2">
                                    <label class="text-xs ml-2">URL / Nombre:</label>
                                    <input type="text" wire:model="network.url" class="form-input">
                                </div>
                            </div>
                            <div class="flex flex-wrap content-center">
                                <button type="submit" class="btn btn-sucess">Guardar</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="flex justify-between py-2">
                        <div class="flex justify-between gap-4 items-center">
                            @switch($net->type)
                                @case('facebook')
                                    <i class="fab fa-facebook-square text-lg text-blue-600"></i> 
                                    @break
                                @case('instagram')
                                    <i class="fab fa-instagram text-lg text-pink-500"></i>
                                    @break
                                @case('twitter')
                                    <i class="fab fa-twitter text-lg text-blue-400"></i>
                                    @break
                                @case('tiktok')
                                    <i class="fab fa-tiktok text-lg text-black"></i>
                                    @break
                                @case('linkedin')
                                    <i class="fab fa-linkedin text-lg text-blue-300"></i>
                                    @break
                                @case('youtube')
                                    <i class="fab fa-youtube text-lg text-red-600"></i>
                                    @break
                            @endswitch
                            <h1 class="text-lg">{{$net->url}}</h1>
                        </div>
                        <div>
                            <i class="fas fa-edit text-blue-500 cursor-pointer text-lg" wire:click="edit({{$net}})" title="Editar"></i>
                            <i class="fas fa-trash text-red-500 cursor-pointer text-lg" wire:click="destroy({{$net}})" title="Eliminar"></i>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        
        @if ($newNetwork == true)
            <form wire:submit.prevent="store">
                <div class="flex justify-around	 object-center gap-2 content-center border rounded-md border-gray-600 shadow py-2 px-2">
                    <div class="gap-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <div class="col-span-2 md:col-span-2 md:grid-flow-col lg:col-span-1">
                            <label class="text-xs ml-2">Tipo:</label>
                            <select wire:model="typeNew" wire:change="changeSelect" class="form-input">
                                <option value=""></option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="twitter">Twitter</option>
                                <option value="tiktok">TikTok</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="youtube">YouTube</option>
                            </select>
                        </div>
                        <div class="col-span-2 md:col-span-1 md:grid-flow-col lg:col-span-1">
                            <label class="text-xs ml-2">HOST:</label>
                            <input type="text" wire:model="urlHost" class="form-input-disable" readonly>
                        </div>
                        <div class="col-span-2 md:col-span-2 md:grid-flow-col lg:col-span-2">
                            <label class="text-xs ml-2">URL / Nombre:</label>
                            <input type="text" wire:model="urlNew" class="form-input">
                        </div>
                    </div>
                    <div class="flex flex-wrap content-center">
                        <button type="submit" class="btn btn-sucess">Guardar</button>
                    </div>
                </div>
            </form>
        @endif
        
        <div class="flex justify-end mt-4">
            <button class="btn btn-sucess" wire:click="create">Agregar <i class="fas fa-plus-square ml-2"></i></button>
        </div>
    </div>
</article>