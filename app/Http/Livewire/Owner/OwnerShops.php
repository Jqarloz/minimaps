<?php

namespace App\Http\Livewire\Owner;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithPagination;

class OwnerShops extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $shops = Shop::where('user_id', auth()->user()->id)
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->paginate(5);

        return view('livewire.owner.owner-shops', compact('shops'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
