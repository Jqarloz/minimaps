<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::where('status', 2)->latest('id')->paginate(15);

        return view('shops.index', compact('shops'));
    }

    public function show(Shop $shop)
    {
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
