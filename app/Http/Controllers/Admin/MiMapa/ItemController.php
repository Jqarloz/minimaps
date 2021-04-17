<?php

namespace App\Http\Controllers\Admin\MiMapa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MiMapa\ItemRequest;
use App\Models\Category;
use App\Models\Menus\Item;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.items.index')->only('index');
        $this->middleware('can:admin.items.create')->only('create', 'store');
        $this->middleware('can:admin.items.edit')->only('edit', 'update');
        $this->middleware('can:admin.items.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.MiMapa.items.index');
    }

    public function create()
    {
        $categories = Category::where('type', 'items')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.MiMapa.items.create', compact('categories', 'tags'));
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('items', $request->file('file'));

            $item->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $item->tags()->attach(
                    $tag,
                    [
                    'taggable_id' => $item->id,
                    'taggable_type' => Item::class
                    ]
                );
            };
        };
        
        return redirect()->route('admin.items.index')->with('info', 'El artículo '. $request->name . ' se creo con éxito en la tienda.');
    }

    public function edit(Item $item)
    {
        $this->authorize('author', $item); /* ItemPolicy para actualizar articulos solo del mismo usuario logeado */

        $categories = Category::where('type', 'items')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.MiMapa.items.edit', compact('item', 'categories', 'tags'));
    }

    public function update(ItemRequest $request, Item $item)
    {
        $this->authorize('author', $item); /* ItemPolicy para actualizar articulos solo del mismo usuario logeado */

        $item->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('items', $request->file('file'));

            if ($item->image) {
                Storage::delete($item->image->url);

                $item->image()->update([
                    'url' => $url
                ]);
            }else{
                $item->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $item->tags()->sync($request->tags);
        };

        return redirect()->route('admin.items.index')->with('info', 'El artículo '. $request->name .' se actualizo con éxito en la tienda.');
    }

    public function destroy(Item $item) /* Usa ItemObserver para eliminar archivo */
    {
        $this->authorize('author', $item);
        $nombre = $item->name;
        $item->delete();
        
        return redirect()->route('admin.items.index')->with('info', 'El artículo '. $nombre .' se elimino con éxito de la tienda.');
    }
}
