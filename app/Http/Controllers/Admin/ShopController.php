<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\ShopRequest;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.shops.index')->only('index');
        $this->middleware('can:admin.shops.create')->only('create', 'store');
        $this->middleware('can:admin.shops.edit')->only('edit', 'update');
        $this->middleware('can:admin.shops.destroy')->only('destroy');
    }

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
        
        return redirect()->route('admin.shops.index', $shop)->with('info', 'El negocio '. $request->name . ' se creo con éxito.');
    }

    public function edit(Shop $shop)
    {
        $this->authorize('author', $shop);

        $categories = Category::where('type', 'Shops')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.shops.edit', compact('shop', 'categories', 'tags'));
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        $this->authorize('author', $shop);

        $shop->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('shops', $request->file('file'));

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

        return redirect()->route('admin.shops.edit',$shop)->with('info', 'El negocio '. $request->name .' se actualizo con éxito');

    }

    public function destroy(Shop $shop)
    {
        $this->authorize('author', $shop);
        $nombre = $shop->name;
        $shop->delete();
        
        return redirect()->route('admin.shops.index')->with('info', 'El negocio '. $nombre .' se elimino con éxito');
    }
}
