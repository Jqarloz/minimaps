<?php

namespace App\Http\Controllers;

use App\Models\Menus\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ItemController extends Controller
{
    public function index()
    {
         if (request()->page) {
            $key = 'items' . request()->page;
        } else {
            $key = 'items';
        }

        if (Cache::has($key)) {
            $items = Cache::get($key);
        } else {
            $items = Item::where('status', 2)->latest('id')->paginate(15);
            Cache::put($key, $items, $minutes = 3);
        }
        
        return view('items.index', compact('items'));
    }

    public function show(Item $item)
    {
        $this->authorize('published', $item); //ServicePolicy para mostrar solo con estatus 2 en view services.show ?User para indicar que puede o no login activo

        $similares = Item::where('category_id', $item->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $item->id)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('items.show', compact('item','similares'));
    }
}
