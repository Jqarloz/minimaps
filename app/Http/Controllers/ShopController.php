<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::where('status', 1)->latest('id')->paginate(15);

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
}
