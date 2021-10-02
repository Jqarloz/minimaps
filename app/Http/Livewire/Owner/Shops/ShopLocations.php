<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Location;
use App\Models\Shop;
use Livewire\Component;

class ShopLocations extends Component
{

    public $shop, $location,$name;
    protected $listeners = ['getAddressForInput', 'getGeoLocation', 'setNewLocation'];
    public $geoLatitude, $geoLongitude;
    
    /* Variables para Crear Location */
    public $addressNew, $cityNew, $zip_codeNew, $stateNew, $countryNew, $referenceNew, $physical_locationNew, $latitudeNew, $longitudeNew; 
    public $newLocation = false; 

    protected $rules = [
        'location.address' => 'required',
        'location.zip_code' => 'required',
        'location.city' => '',
        'location.state' => '',
        'location.country' => '',
        'location.latitude' => '',
        'location.longitude' => '',
        'location.reference' => '',
        'location.physical_location' => ''
    ];

    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        $this->location = new Location();

        if ($shop->location) {
            $this->geoLatitude = $shop->location->latitude; 
            $this->geoLongitude = $shop->location->longitude;
        }else{
            $this->geoLatitude = 19.16833728378268; 
            $this->geoLongitude = -98.30954112566016;
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

        if ( !$this->shop->location) {
            $this->addressNew = $this->location->address;
            $this->cityNew = $this->location->city;
            $this->zip_codeNew = $this->location->zip_code;
            $this->stateNew = $this->location->state;
            $this->countryNew = $this->location->country;
            $this->latitudeNew = $this->location->latitude;
            $this->longitudeNew = $this->location->longitude;
            $this->referenceNew = $this->location->reference;
            $this->physical_locationNew = $this->location->physical_location;
        }

        $this->updateMap($this->location);
    }

    public function getGeoLocation($latitude, $longitude)
    {
        $this->geoLatitude = $latitude; 
        $this->geoLongitude = $longitude;
    }

    public function create()
    {
        $this->newLocation = true;
    }

    public function store()
    {
        $this->validate([
            'addressNew' => 'required',
            'zip_codeNew' => 'required',
            'physical_locationNew' => 'required'
        ]);

        $this->shop->location()->create([
            'address' => $this->addressNew,
            'zip_code' => $this->cityNew,
            'city' => $this->zip_codeNew,
            'state' => $this->stateNew,
            'country' => $this->countryNew,
            'latitude' => $this->latitudeNew,
            'longitude' => $this->longitudeNew,
            'reference' => $this->referenceNew,
            'physical_location' => $this->physical_locationNew
        ]);

        //update variables nuevamente
        $this->location = new Location();
        $this->shop = Shop::find($this->shop->id);
        $this->updateMap($this->shop->location);
        $this->newLocation = false;
    }

}
