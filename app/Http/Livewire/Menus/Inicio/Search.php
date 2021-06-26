<?php

namespace App\Http\Livewire\Menus\Inicio;

use App\Models\Shop;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.menus.inicio.search');
    }

    public function getResultsProperty(){
        return Shop::where('name','LIKE', '%'. $this->search . '%')
            ->where('status',2)
            ->take(8)
            ->get();
    }

}
