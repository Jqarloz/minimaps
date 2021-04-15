<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menus\Service;
use Livewire\Component;

use Livewire\WithPagination;

class ServicesIndex extends Component
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
        $services = Service::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.services-index', compact('services'));
    }
}
