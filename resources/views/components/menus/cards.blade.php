@props(['shop'])
<article class="bg-white shadow-lg rounded overflow-hidden">
    <img class="h-36 w-full object-cover" src="@if($shop->image) {{Storage::url($shop->image->url)}} @else {{Storage::url('default/shop.jpg')}} @endif" alt="">
    
    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($shop->name, 40, '...')}}</h1>
        <p class="text-gray-500 text-sm mb-2">{{$shop->category->name}}</p>

        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$shop->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$shop->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-thumbs-up text-blue-400"></i>
                ({{$shop->reactions_count}})
            </p>
        </div>

        <a href="{{route('shops.show',$shop)}}" class="block text-center w-full mt-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
            Mas Información    
        </a>
    </div>

    
    
</article>