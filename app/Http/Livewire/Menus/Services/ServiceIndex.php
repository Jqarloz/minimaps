<?php

namespace App\Http\Livewire\Menus\Services;

use App\Models\Category;
use App\Models\Menus\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceIndex extends Component
{
    use WithPagination;

    public $category_id;

    public function render()
    {
        $categories = Category::where('type', 'services')->orderby('name')->get();

        /* if (request()->page) {
            $key = 'services' . request()->page;
        } else {
            $key = 'services';
        }

        if (Cache::has($key)) {
            $services = Cache::get($key);
        } else {
            $services = Services::where('status', 2)->latest('id')->paginate(15);
            Cache::put($key, $services, $seconds = 60);
        } */

        $services = Service::where('status', 2)
                        ->category($this->category_id)
                        ->latest('id')
                        ->paginate(15);

        return view('livewire.menus.services.service-index', compact('services', 'categories'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id']);
    }
    
}
