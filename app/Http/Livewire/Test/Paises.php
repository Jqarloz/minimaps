<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;

class Paises extends Component
{
    public $paises = ['Mexico','Brazil','USA'];
    public $pais;

    public function render()
    {
        return view('livewire.test.paises');
    }

    public function agregar(){
        array_push($this->paises, $this->pais);

        $this->reset('pais');
    }
}
