<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Location;
use Livewire\Component;

class MapView extends Component
{

    public $location;

    public function mount(Location $location)
    {
        $this->location = $location;
    }

    public function render()
    {
        return view('livewire.owner.shops.map-view');
    }
}
