<x-app-layout>

    {{-- GEOLOCALIZACION SCRIPT --}}
    <script>
        function setloc(){

            document.getElementById('latitude').value= 'latitud';
            document.getElementById('longitude').value= 'longitud';  

        }   
    </script>


    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($shop->image->url)}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$shop->name}}</h1>
                <h2 class="text-xl mb-4">Categoria: {{$shop->category->name}}</h2>
                            <p class="mb-3"><i class="fas fa-clock"></i> Horario: {{$shop->hour_always == 'Y' ? 'Siempre Abierto' : $shop->hour_open . ' Hrs a ' . $shop->hour_close . ' Hrs.'}}</p>
                @if ($shop->home_service == 'Y')
                    @if ($shop->hs_isfree == 'Y')
                            <p class="mb-3"><i class="fas fa-shipping-fast"></i> ¡Servicio a domicilio gratuito!.</p>
                    @else
                        @if (!empty($shop->hs_maxcost)) 
                            <p class="mb-3"><i class="fas fa-shipping-fast"></i> Servicio a domicilio desde ${{$shop->hs_mincost}} hasta ${{$shop->hs_maxcost}}</p>
                        @else
                            <p class="mb-3"><i class="fas fa-shipping-fast"></i> Servicio a domicilio fijo de ${{$shop->hs_mincost}}</p>
                        @endif
                    @endif
                @endif
                <div class="flex">
                    <p class="mb-3"><i class="far fa-star"></i> Calificación:  {{$shop->rating}}</p>
                    <ul class="flex text-sm ml-1">
                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$shop->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                    </ul>
                </div>
                            
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-2">

        <div class="col-span-2 mb-8">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold mb-2 text-2xl">Acerca de {{$shop->name}}</h1>
                    <p class="text-gray-800 text text-sm">{{$shop->description}}</p>
                </div>
            </section>
        </div>
        
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
                        <h1 class="font-bold text-lg text-gray-800 ml-4">Redes Sociales</h1>
                    </header>
                    <div class="bg-white py-2 px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" x-show="open">
                        @foreach ($shop->networks as $network)
                            <div class="mx-1 mb-3 md:mx-2 lg:mx-3 h-full">
                                @if ($network->type == 'facebook')
                                    <a class="btn bg-blue-600 text-white btn-block" href="{{'https://www.facebook.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-facebook-square"></i> Facebook
                                    </a>
                                @elseif($network->type == 'instagram')
                                    <a class="btn bg-pink-500 text-white btn-block" href="{{'https://www.instagram.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-instagram"></i> Instagram
                                    </a>
                                @elseif($network->type == 'twitter')
                                    <a class="btn bg-blue-400 w-full text-white btn-block" href="{{'https://twitter.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                @elseif($network->type == 'tiktok')
                                    <a class="btn bg-black w-full text-white btn-block" href="{{'https://www.tiktok.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-tiktok"></i> TikTok
                                    </a>
                                @elseif($network->type == 'linkedin')
                                    <a class="btn bg-blue-200 w-full btn-block" href="{{'https://www.linkedin.com/in/' . $network->url}}" target="blank">
                                        <i class="fab fa-linkedin"></i> LinkedIn
                                    </a>
                                @elseif($network->type == 'youtube')
                                    <a class="btn bg-red-600 w-full text-white btn-block" href="{{'https://www.youtube.com/channel/' . $network->url}}" target="blank">
                                        <i class="fab fa-youtube"></i> YouTube
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    
                </article>
            </section>    

            <section class="mt-4">
                <article class="mb-4 shadow" x-data="{ open: false }">
                    <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200 flex" x-on:click="open = !open">
                        <template x-if="open">
                            <i class="fas fa-chevron-right font-bold text-lg"></i>
                        </template>
                        <template x-if="!open">
                            <i class="fas fa-chevron-down font-bold text-lg"></i>
                        </template>
                        <h1 class="font-bold text-lg text-gray-800 ml-4">Contacto</h1>
                    </header>
                    <div class="bg-white py-2 px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" x-show="open">
                        @foreach ($shop->contacts as $contact)
                            @if ($contact->type == 'movil')
                                <div class="text-xl mr-2 text-center my-1">
                                    <i class="fab fa-whatsapp text-green-500"></i> 
                                    <a target="blank" href="https://api.whatsapp.com/send?phone={{str_replace("+","",$contact->name)}}">{{$contact->name}} </a>
                                </div>
                            @elseif ($contact->type == 'phone')
                                <div class="text-xl mr-2 text-center my-1">
                                    <i class="fas fa-phone-square-alt text-green-800"></i> {{$contact->name}} 
                                </div>
                            @elseif ($contact->type == 'email')
                                <div class="text-xl mr-2 text-center my-1">
                                    <i class="fas fa-envelope text-red-500"></i> {{$contact->name}} 
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                </article>
            </section>    

            <section class="mt-4">
                <article class="mb-4 shadow" x-data="{ open: true }">
                    <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200 flex" x-on:click="open = !open">
                        <template x-if="open">
                            <i class="fas fa-chevron-right font-bold text-lg"></i>
                        </template>
                        <template x-if="!open">
                            <i class="fas fa-chevron-down font-bold text-lg"></i>
                        </template>
                        <h1 class="font-bold text-lg text-gray-800 ml-4">Ubicación</h1>
                    </header>
                    <div class="bg-white py-2 px-4" x-show="open">
                        <div>
                            <div class="text-xl mr-2 text-center my-1">
                                <i class="fas fa-map-marker-alt"></i> {{$shop->location->address . ", " . $shop->location->state}}
                                
                            </div>

                            @php
                                $varLocation = $shop->location->latitude . "," . $shop->location->longitude;
                                $url = "https://www.google.com/maps/dir/?api=1&destination=".$varLocation."&map_action=map&center=".$varLocation;
                                $url2 = "https://maps.googleapis.com/maps/api/staticmap?center=".$varLocation."&zoom=15&size=600x300&maptype=roadmap&markers=color:red%7Clabel:".substr($shop->name,0,1)."%7C".$varLocation."&key=AIzaSyBokaTHMOxzrIvuLG9rMUCJuY9bF0JwEjE"
                            @endphp

                            <div class="my-4">
                                <center><img class="object-center" src="{{$url2}}" alt=""></center>
                            </div>
                            <div class="grid justify-items-center">
                                <a class="btn btn-primary" target="blank" href="{{$url}}">Ver en Maps</a>
                            </div>
                        </div>
                    </div>
                    
                </article>
            </section>    
            
        </div>
    </div>

</x-app-layout>