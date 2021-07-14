<?php

namespace App\Http\Livewire\Owner\Shops;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithPagination;

class ShopsIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $shops = Shop::where('user_id', auth()->user()->id)
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->latest('id')
                        ->paginate(5);

        return view('livewire.owner.shops.shops-index', compact('shops'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
