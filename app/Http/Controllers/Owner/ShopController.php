<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Shop;

use App\Http\Requests\Admin\ShopRequest;

class ShopController extends Controller
{

    public function index()
    {
        return view('owner.shops.index');
    }

    public function create()
    {
        $categories = Category::where('type', 'Shops')->pluck('name', 'id');

        return view('owner.shops.create', compact('categories'));
    }

    public function store(ShopRequest $request)
    {
        $shop = Shop::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('shops', $request->file('file'));

            $shop->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $shop->tags()->attach(
                    $tag,
                    [
                    'taggable_id' => $shop->id,
                    'taggable_type' => Shop::class
                    ]
                );
            };
        };
        
        return redirect()->route('owner.shops.index')->with('info', 'El negocio '. $request->name . ' se creo con éxito.');
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
