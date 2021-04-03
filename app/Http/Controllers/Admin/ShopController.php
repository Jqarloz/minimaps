<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\ShopStoreRequest;

class ShopController extends Controller
{
    
    public function index()
    {
        return view('admin.shops.index');
    }

    public function create()
    {
        $categories = Category::where('type', 'Shops')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.shops.create', compact('categories', 'tags'));
    }

    public function store(ShopStoreRequest $request)
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
        
        return redirect()->route('admin.shops.edit', $shop);
    }

    public function show(Shop $shop)
    {
        return view('admin.shops.show', compact('shop'));
    }

    public function edit(Shop $shop)
    {
        return view('admin.shops.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
