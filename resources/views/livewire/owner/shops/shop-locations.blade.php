<section>
    <h1 class="text-2xl font-bold">Ubicación del negocio</h1>
    <hr class="mb-6 mt-2">

    <article class="card">
        <div class="card-body bg-gray-50">
            <header></header>

            @if ($shop->location)
                <form wire:submit.prevent="update">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-4 object-center">
                        <div class="grid grid-cols-1">
                            <label class="text-xs col-span-1 ml-2">Dirección:</label>
                            <input wire:model="location.address" name="address" id="address" type="text" class="form-input-disable col-span-1 md:col-span-1 lg:col-span-2" readonly>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="text-xs col-span-1 ml-2">Municipio/Localidad:</label>
                            <input wire:model="location.city" name="city" id="city" type="text" class="form-input-disable col-span-1 md:col-span-2 lg:col-span-1" readonly>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="text-xs col-span-1 ml-2">Código Postal:</label>
                            <input wire:model="location.zip_code" name="zip_code" id="zip_code" type="text" class="form-input-disable col-span-1 md:col-span-1 lg:col-span-1" readonly>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="text-xs col-span-1 ml-2">Estado:</label>
                            <input wire:model="location.state" name="state" id="state" type="text" class="form-input-disable col-span-1 md:col-span-1 lg:col-span-1" readonly>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="text-xs col-span-1 ml-2">País:</label>
                            <input wire:model="location.country" name="country" id="country" type="text" class="form-input-disable col-span-1 md:col-span-1 lg:col-span-1" readonly>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-4">
                        <div class="grid grid-cols-1 md:col-span-2 lg:col-span-2">
                            <label class="text-xs col-span-1 ml-2">Referencias:</label>
                            <input wire:model="location.reference" type="text" class="form-input col-span-2">
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="text-xs col-span-1 ml-2">¿El negocio tiene local fijo?</label>
                            <select wire:model="location.physical_location" class="form-input col-span-1">
                                <option value="N">No</option>
                                <option value="S">Si</option>
                            </select>
                        </div>
                    </div>

                    <div class=" gap-4 mt-4 hidden">
                        <div class="">
                            <label class="text-xs col-span-1 ml-2">Latitud:</label>
                            <input wire:model="location.latitude" id="latitude" name="latitude" type="text" class="form-input col-span-1">
                        </div>
                        <div class="">
                            <label class="text-xs col-span-1 ml-2">Longuitud:</label>
                            <input wire:model="location.longitude" id="longitude" name="longitude" type="text" class="form-input col-span-1">
                        </div>
                    </div>

                    <div class="object-center justify-center mt-6 flex">
                        <form>
                            <a @click="open = true" class="btn btn-primary cursor-pointer" onclick="initMap()">Elegir nueva ubicación</a>
                        </form>
                    </div>  
                    

                    <div x-data="{open: false}" class="gap-4 mt-4">
                        <div 
                        x-show="open"
                        class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center px-4 md:px-0">
                            <div 
                            @click.away="open = false"
                            class="bg-white flex flex-col shadow-2xl rounded-lg border-2 border-gray-400 p-6">
                                <div class="flex justify-between mb-4">
                                    <h3 class="font-bold text-2xl" >Elige ubicación</h3>
                                    <a @click="open = false" class="cursor-pointer"><i class="fas fa-times text-lg"></i></a>
                                </div>
                                <div class="flex items-center justify-items-center gap-2">
                                    <input type="text" id="searchAddress" name="searchAddress" class="form-input">
                                    <a id="buttonSearch" class="btn btn-primary cursor-pointer col-span-1">Buscar</a>
                                </div>
                                <p class="text-xs text-red-500" id="searchError" name="searchError"></p>
                                <br>
                                <div>
                                    <h5 id="addressLabel" class="text-sm font-bold mb-2"></h5>
                                    <p class="text-xs">Arrastra el marcador o da doble clic sobre la ubicación deseada o ingrese su dirección en el cuadro de texto.</p>
                                </div>
                                <div id="map" class="h-72 border w-full border-black">
                                </div>
                                <br>
                                <div class="mt-2 flex justify-center">                                
                                    <a id="buttonOK" class="btn btn-sucess cursor-pointer" @click="open = false">Hecho</a>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    

                    <div class="mt-4">
                        @livewire('owner.shops.map-view', ['location' => $shop->location], key('shops.map-view' .$shop->location->id))
                    </div>
                    
                </form>
            @else
                <div class="flex items-center justify-center h-24">
                    <button class="btn btn-sucess text-lg font-bold">Crear ubicación</button>
                </div>
            @endif

            
            
        </div>
    </article>

    <x-slot name="mapJS">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt2VU9zcFfJojsNYjrYhC15kmZNQJRmks&callback=initMap&libraries=&v=weekly"
            async
        ></script>
        <script src="{{asset('js/owner/shops/mapJS.js')}}"></script>
    </x-slot>
</section>
