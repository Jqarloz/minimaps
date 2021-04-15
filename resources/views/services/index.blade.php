<x-app-layout>
    <div class="container bg-gray-300 py-8">
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
    </div>
</x-app-layout>