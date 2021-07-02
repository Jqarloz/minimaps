<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Shop;

class ShopController extends Controller
{

    public function index()
    {
        return view('owner.shops.index');
    }

    public function create()
    {
        return view('owner.shops.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Shop $shop)
    {
        return view('owner.shops.show', compact('shop'));
    }

    public function edit(Shop $shop)
    {
        $categories = Category::where('type', 'Shops')->pluck('name', 'id');

        return view('owner.shops.edit', compact('shop', 'categories'));
    }

    public function update(Request $request, Shop $shop)
    {
        
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
