<x-app-layout>
    {{-- <div class="container bg-gray-300 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <article style="background-image: url(@if($service->image) {{Storage::url($service->image->url)}} @else {{Storage::url('default/service.jpg')}} @endif)" class="w-full h-80 bg-cover bg-center">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($service->tags as $tag)
                                <a href="{{route('shops.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-white leading-8 font-bold mt-2">
                            <a href="{{route('services.show', $service)}}">{{$service->name}}</a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$services->links()}}
        </div>
    </div> --}}
    <div class="container bg-gray-300 py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <img class="h-36 w-full object-cover" src="@if($service->image) {{Storage::url($service->image->url)}} @else {{Storage::url('default/service.jpg')}} @endif" alt="">
                    
                    <div class="px-6 py-4">
                        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($service->name, 40, '...')}}</h1>
                        <p class="text-gray-500 text-sm mb-2">{{$service->category->name}}</p>

                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$service->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                            </ul>
                            <p class="text-sm text-gray-500 ml-auto">
                                <i class="fas fa-thumbs-up text-blue-400"></i>
                                ({{$service->reactions_count}})
                            </p>
                        </div>

                        <a href="{{route('services.show',$service)}}" class="block text-center w-full mt-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                            Mas Información    
                        </a>
                    </div>

                    
                    
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$services->links()}}
        </div>
    </div>
</x-app-layout>