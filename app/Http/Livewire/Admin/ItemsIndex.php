<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menus\Item;
use Livewire\Component;

use Livewire\WithPagination;

class ItemsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; /* Paginacion para AdminLt3 */

    public $search; /* Variable para buscador Livewire */

    public function updatingSearch() /* Funcion para actualizar pagina cada que se escriba algo.. */
    {

        $this->resetPage();

    }

    public function render()
    {
        $items = Item::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.items-index', compact('items'));
    }
}
