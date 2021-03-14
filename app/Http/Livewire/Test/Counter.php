<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $titulo;
    public $descripcion;
    
    public function mount($data){
        $this->titulo = $data['titulo'];
        $this->descripcion = $data['descripcion'];
    }

    public function render()
    {
        return view('livewire.test.counter');
    }
    public function increment()
    {
        $this->count++;
    }
}
