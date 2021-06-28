<x-app-layout>

    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($service->image->url)}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$service->name}}</h1>
                <h2 class="text-xl mb-4">Categoria: {{$service->category->name}}</h2>
                {{-- <p class="mb-3"><i class="fas fa-clock"></i> Horario: {{$service->hour_always == 'Y' ? 'Siempre Abierto' : $service->hour_open . ' Hrs a ' . $service->hour_close . ' Hrs.'}}</p>
                @if ($service->home_service == 'Y')
                    @if ($service->hs_isfree == 'Y')
                            <p class="mb-3"><i class="fas fa-shipping-fast"></i> ¡Servicio a domicilio gratuito!.</p>
                    @else
                        @if (!empty($service->hs_maxcost)) 
                            <p class="mb-3"><i class="fas fa-shipping-fast"></i> Servicio a domicilio desde ${{$service->hs_mincost}} hasta ${{$service->hs_maxcost}}</p>
                        @else
                            <p class="mb-3"><i class="fas fa-shipping-fast"></i> Servicio a domicilio fijo de ${{$service->hs_mincost}}</p>
                        @endif
                    @endif
                @endif --}}
                <div class="flex">
                    <p class="mb-3"><i class="far fa-star"></i> Calificación:  {{$service->rating}}</p>
                    <ul class="flex text-sm ml-1">
                        <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$service->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                    </ul>
                </div>
                            
            </div>
        </div>
    </section>

    {{-- Contenido del negocio --}}
    <div class="container grid grid-cols-2 mb-8">

        {{-- Descripcion --}}
        <div class="col-span-2 mb-4">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold mb-2 text-2xl">Acerca de {{$service->name}}</h1>
                    <p class="text-gray-800 text text-sm">{{$service->description}}</p>
                </div>
            </section>
        </div>
     
        {{-- Redes Sociales--}}
        <div class="col-span-2">
            <section class="mt-4">
                <article class="mb-4 shadow" x-data="{ open: false }">
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
                        @foreach ($service->networks as $network)
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
        </div>

        {{-- Contacto --}}
        <div class="col-span-2">
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
                        @foreach ($service->contacts as $contact)
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
        </div>

        {{-- Ubicacion --}}
        <div class="col-span-2">
            <section class="mt-4">
                <article class="mb-4 shadow" x-data="{ open: false }">
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
                                <i class="fas fa-map-marker-alt"></i> {{$service->location->address . ", " . $service->location->state}}
                                
                            </div>

                            @php
                                $varLocation = $service->location->latitude . "," . $service->location->longitude;
                                $url = "https://www.google.com/maps/dir/?api=1&destination=".$varLocation."&map_action=map&center=".$varLocation;
                                $url2 = "https://maps.googleapis.com/maps/api/staticmap?center=".$varLocation."&zoom=15&size=600x300&maptype=roadmap&markers=color:red%7Clabel:".substr($service->name,0,1)."%7C".$varLocation."&key=AIzaSyBokaTHMOxzrIvuLG9rMUCJuY9bF0JwEjE"
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

    {{-- Seccion de comentarios --}}
    <section class="bg-gray-700 py-12 mb-8">
        <div class="container">
            <h1 class="text-3xl font-bold text-white">Comentarios</h1>
        </div>
    </section>

    {{-- Negocios Similares --}}
    <section class="mb-8 hidden lg:block">
        <div class="container">
            <aside>
                @foreach ($similares as $similar)
                    <article class="flex mb-6 items-center">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1 class="mb-2">
                                <a class="font-bold text-gray-700 mb-4" href="{{route('shops.show', $similar)}}">{{Str::limit($similar->name, 35)}}</a>
                            </h1>
                            <p class="text-base font-semibold text-gray-700">{{$similar->category->name}}</p>
                            <p class="text-sm text-gray-500"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                        </div>
                    </article>                    
                @endforeach
            </aside>
        </div>
    </section>

    {{-- <div class="container py-8">
        <h1>{{$service->name}}</h1>

        <div class="text-lg mb-4 text-gray-800 font-bold">
            {!!$service->description!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6"> --}}
            {{-- Contenido Principal --}}
            {{-- <div class="lg:col-span-2">
                <figure>
                    @if ($service->image)
                        <img class="w-full h-80 object-cover bf-center" src="{{Storage::url($service->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover bf-center" src="{{Storage::url('default/service.jpg')}}" alt="">
                    @endif
                </figure>
            </div> --}}
            {{-- Contenido Relacionado --}}
            {{-- <aside>
                <h1 class="text-2xl font-bold text-gray-700 mb-4">Más en {{$service->category->name}}</h1>
                
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('services.show', $similar)}}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url('default/service.jpg')}}" alt="">        
                                @endif
                                <span class="ml-2 text-gray-700">{{$similar->name}}</span>
                            </a>
                        </li>   
                    @endforeach
                </ul>
            </aside>
        </div>
    </div> --}}

</x-app-layout>