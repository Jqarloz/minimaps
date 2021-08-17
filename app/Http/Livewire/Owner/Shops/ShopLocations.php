<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Location;
use App\Models\Shop;
use Livewire\Component;

class ShopLocations extends Component
{

    public $shop, $location;

    protected $rules = [
        'location.address' => 'required',
        'location.zip_code' => 'required',
        'location.city' => '',
        'location.state' => '',
        'location.country' => '',
        'location.latitude' => '',
        'location.longitude' => '',
        'location.reference' => '',
        'location.physical_location' => '',
    ];

    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        $this->location = $shop->location;
    }

    public function render()
    {
        return view('livewire.owner.shops.shop-locations');
    }

    public function edit(Location $location)
    {
        $this->location = $location;
    }

    public function updateMap()
    {
        return view('livewire.owner.shops.map-view');
    }
}
