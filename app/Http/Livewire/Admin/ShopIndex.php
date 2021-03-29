<?php

namespace App\Http\Livewire\Admin;

use App\Models\Shop;
use Livewire\Component;

use Livewire\WithPagination;

class ShopIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $shops = Shop::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.shop-index', compact('shops'));
    }
}
