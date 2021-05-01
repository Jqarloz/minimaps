<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

class ShopController extends Controller
{
    public function index()
    {
         /* if (request()->page) {
            $key = 'shops' . request()->page;
        } else {
            $key = 'shops';
        }

        if (Cache::has($key)) {
            $shops = Cache::get($key);
        } else {
            $shops = Shop::where('status', 2)->latest('id')->paginate(15);
            Cache::put($key, $shops, $seconds = 60);
        } */
        
        return view('shops.index');
    }

    public function show(Shop $shop)
    {
        $this->authorize('published', $shop);

        $similares = Shop::where('category_id', $shop->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $shop->id)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('shops.show', compact('shop','similares'));
    }

    public function category(Category $category)
    {
        $shops = Shop::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(10)
                        ->get();
        return view('shops.index', compact('shops'));
    }

    public function tag(Tag $tag)
    {
        $shops = $tag->shops()->where('status',2)->latest('id')->paginate(4);
        
        return view('shops.tag', compact('shops', 'tag'));
    }
}
