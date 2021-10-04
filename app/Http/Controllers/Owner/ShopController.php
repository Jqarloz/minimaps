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
            $url = Storage::put('shops/' . $shop->id, $request->file('file'));

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

    public function update(ShopRequest $request, Shop $shop)
    {
        $this->authorize('author', $shop);

        $shop->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('shops/' . $shop->id, $request->file('file'));

            if ($shop->image) {
                Storage::delete($shop->image->url);

                $shop->image()->update([
                    'url' => $url
                ]);
            }else{
                $shop->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $shop->tags()->sync($request->tags);
        };

        return redirect()->route('owner.shops.index')->with('info', 'El negocio '. $request->name .' se actualizo con éxito');
    }

    public function destroy(Shop $shop)
    {
        //
    }

    public function locations(Shop $shop){
        return view('owner.shops.locations', compact('shop'));
    }

    public function social(Shop $shop){
        return view('owner.shops.social', compact('shop'));
    }
}
