<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Location;
use App\Models\Shop;
use Livewire\Component;

class ShopLocations extends Component
{

    public $shop, $location,$address;
    protected $listeners = ['getAddressForInput' => 'getAddressForInput', 'getGeoLocation' => 'getGeoLocation'];
    public $geoLatitude, $geoLongitude;
    

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
        $this->location = new Location();

        if ($shop->location) {
            $this->geoLatitude = $shop->location->latitude; 
            $this->geoLongitude = $shop->location->longitude;
        };
    }

    public function render()
    {
        return view('livewire.owner.shops.shop-locations');
    }

    public function edit(Location $location)
    {
        $this->location = $location;
    }

    public function update()
    {
        $this->validate();
        $this->location->save();

        //update variables nuevamente
        $this->location = new Location();
        $this->shop = Shop::find($this->shop->id);
        $this->updateMap($this->shop->location);

    }

    public function updateMap($location)
    {
        return view('livewire.owner.shops.map-view', $location);
    }

    public function getAddressForInput($latitude, $longitud, $postal_code, $locality, $political, $country, $address)
    {
        $this->location->latitude = $latitude;
        $this->location->longitude = $longitud;
        $this->location->zip_code = $postal_code;
        $this->location->city = $locality;
        $this->location->state = $political;
        $this->location->country = $country;
        $this->location->address = $address;
        $this->updateMap($this->location);
    }

    public function getGeoLocation($latitude, $longitude)
    {
        $this->geoLatitude = $latitude; 
        $this->geoLongitude = $longitude;
    }

}
