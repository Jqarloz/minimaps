<x-app-layout>

    <div class="container py-8">
        <h1>{{$service->name}}</h1>

        <div class="text-lg mb-4 text-gray-800 font-bold">
            {!!$service->description!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido Principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($service->image)
                        <img class="w-full h-80 object-cover bf-center" src="{{Storage::url($service->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover bf-center" src="{{Storage::url('default/service.jpg')}}" alt="">
                    @endif
                </figure>
            </div>
            {{-- Contenido Relacionado --}}
            <aside>
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
    </div>

</x-app-layout>