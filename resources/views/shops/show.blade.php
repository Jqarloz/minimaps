<x-app-layout>

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

    <div class="container grid grid-cols-3">

        <div class="col-span-2 mb-12">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold mb-2 text-2xl">Acerca de {{$shop->name}}</h1>
                    <p class="text-gray-800 text text-sm">{{$shop->description}}</p>
                </div>
            </section>
        </div>
        
        <div class="col-span-2">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold mb-2 text-2xl">Contacto</h1>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                        @foreach ($shop->networks as $network)
                            <div class="my-2 w-full">
                                @if ($network->type == 'facebook')
                                    <a class="btn bg-blue-600 w-full" href="{{'https://www.facebook.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-facebook-square"></i> Facebook
                                    </a>
                                @elseif($network->type == 'instagram')
                                    <a class="btn bg-pink-500 w-full" href="{{'https://www.instagram.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-instagram"></i> Instagram
                                    </a>
                                @elseif($network->type == 'twitter')
                                    <a class="btn" href="{{'https://twitter.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                @elseif($network->type == 'tiktok')
                                    <a class="btn" href="{{'https://www.tiktok.com/' . $network->url}}" target="blank">
                                        <i class="fab fa-tiktok"></i> TikTok
                                    </a>
                                @elseif($network->type == 'linkedin')
                                    <a class="btn" href="{{'https://www.linkedin.com/in/' . $network->url}}" target="blank">
                                        <i class="fab fa-linkedin"></i> LinkedIn
                                    </a>
                                @elseif($network->type == 'youtube')
                                    <a class="btn" href="{{'https://www.youtube.com/channel/' . $network->url}}" target="blank">
                                        <i class="fab fa-youtube"></i> YouTube
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

    </div>

    {{-- <div class="container py-8">
        <h1>{{$shop->name}}</h1>

        <div class="text-lg mb-4 text-gray-800 font-bold">
            {!!$shop->description!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6"> --}}
            {{-- Contenido Principal --}}
            {{-- <div class="lg:col-span-2">
                <figure>
                    @if ($shop->image)
                        <img class="w-full h-80 object-cover bf-center" src="{{Storage::url($shop->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover bf-center" src="{{Storage::url('default/shop.jpg')}}" alt="">
                    @endif
                </figure>
            </div> --}}
            {{-- Contenido Relacionado --}}
            {{-- <aside>
                <h1 class="text-2xl font-bold text-gray-700 mb-4">Más en {{$shop->category->name}}</h1>
                
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('shops.show', $similar)}}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url('default/shop.jpg')}}" alt="">        
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