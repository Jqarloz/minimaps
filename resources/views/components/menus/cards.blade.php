@props(['shop'])
<article class="card">
    <img class="h-36 w-full object-cover" src="@if($shop->image) {{Storage::url($shop->image->url)}} @else {{Storage::url('default/shop.jpg')}} @endif" alt="">
    
    <div class="card-body">
        <h1 class="card-tittle">{{Str::limit($shop->name, 40, '...')}}</h1>
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

        <a href="{{route('shops.show',$shop)}}" class="mt-4 btn btn-primary btn-block">
            Mas Información    
        </a>
    </div>

    
    
</article>