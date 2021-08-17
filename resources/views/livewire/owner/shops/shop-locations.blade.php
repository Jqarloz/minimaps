<section>
    <h1 class="text-2xl font-bold">Ubicación del negocio</h1>
    <hr class="mb-6 mt-2">

    <article class="card">
        <div class="card-body bg-gray-100">
            <header></header>

            <form wire:submit.prevent="update">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Dirección:</label>
                        <input wire:model="location.address" type="text" class="form-input col-span-1 md:col-span-1 lg:col-span-2">
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Código Postal:</label>
                        <input wire:model="location.zip_code" type="text" class="form-input col-span-1 md:col-span-1 lg:col-span-1">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Municipio/Localidad:</label>
                        <input wire:model="location.city" type="text" class="form-input col-span-1 md:col-span-2 lg:col-span-1">
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Estado:</label>
                        <input wire:model="location.state" type="text" class="form-input col-span-1 md:col-span-1 lg:col-span-1">
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">País:</label>
                        <input wire:model="location.country" type="text" class="form-input col-span-1 md:col-span-1 lg:col-span-1">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Latitud:</label>
                        <input wire:model="location.latitude" type="text" class="form-input col-span-1">
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Longuitud:</label>
                        <input wire:model="location.longitude" type="text" class="form-input col-span-1">
                    </div>
                </div>

                

                <div x-data="{open: false}" class="gap-4 mt-4">
                    <div 
                    x-show="open"
                    class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center px-4 md:px-0">
                        <div 
                        @click.away="open = false"
                        class="bg-white flex flex-col shadow-2xl rounded-lg border-2 border-gray-400 p-6">
                            <div class="flex justify-between mb-4">
                                <h3 class="font-bold text-2xl">Modal ubicación</h3>
                                <a @click="open = false"><i class="fas fa-times text-lg"></i></a>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit!</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <form>
                            <input type="text" id="latitude" name="latitude">
                            <input type="text" id="longitude" name="longitude">
                            <a @click="open = true" class="btn btn-primary cursor-pointer">Elegir ubicación</a>
                        </form>
                    </div>
                </div>

                

                <div class="gap-4 mt-4">
                    @livewire('owner.shops.map-view', ['location' => $shop->location], key('shops.map-view' .$shop->location->id))
                </div>
                
                <div class="grid grid-cols-1 gap-4 mt-4">
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">Referencias:</label>
                        <input wire:model="location.reference" type="text" class="form-input col-span-2">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="grid grid-cols-1">
                        <label class="text-xs col-span-1 ml-2">¿El negocio tiene local fijo?</label>
                        <input wire:model="location.physical_location" type="text" class="form-input col-span-1">
                    </div>
                </div>
            </form>
            
        </div>
    </article>
</section>
