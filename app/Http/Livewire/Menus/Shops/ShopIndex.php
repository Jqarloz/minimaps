<?php

namespace App\Http\Livewire\Menus\Shops;

use App\Models\Shop;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShopIndex extends Component
{

    use WithPagination;

    public $category_id;

    public function render()
    {
        $categories = Category::where('type', 'shops')->orderby('name')->get();

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

        $shops = Shop::where('status', 2)
                        ->category($this->category_id)
                        ->latest('id')
                        ->paginate(15);

        return view('livewire.menus.shops.shop-index', compact('shops', 'categories'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id']);
    }
}
