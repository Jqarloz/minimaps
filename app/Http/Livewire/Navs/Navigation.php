<?php

namespace App\Http\Livewire\Navs;

use App\Models\Menu;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $menus = Menu::all();
        return view('livewire.navs.navigation', compact('menus'));
    }
}
