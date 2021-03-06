@props(['service'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($service->image)
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($service->image->url)}}" alt="">
    @else
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url('default/service.jpg')}}" alt="">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('services.show',$shop)}}">{{$service->name}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$service->description!!}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($service->tags as $tag)
            <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2" href="{{route('shops.tag', $tag)}}">{{$tag->name}}</a>
        @endforeach
    </div>
</article>