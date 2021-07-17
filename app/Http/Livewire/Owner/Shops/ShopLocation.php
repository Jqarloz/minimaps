<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Shop;
use Livewire\Component;

class ShopLocation extends Component
{

    public $shop;

    public function mount(Shop $shop)
    {
        $this->shop = $shop;
    }

    public function render()
    {
        return view('livewire.owner.shops.shop-location')->layout('layouts.owner.owner');
    }
}
