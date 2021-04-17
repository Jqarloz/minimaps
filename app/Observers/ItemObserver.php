<?php

namespace App\Observers;

use App\Models\Menus\Item;
use Illuminate\Support\Facades\Storage;

class ItemObserver
{
    public function creating(Item $item) /* Accion para eliminar en consola */
    {
        if (! \App::runningInConsole()) {
            $item->user_id = auth()->user()->id;
        }
        
    }

   
    public function deleting(Item $item) /* Eliminar archivos y no hacer spam en servidor */
    {
        if ($item->image) {
           Storage::delete($item->image->url); 
        }
    }
}
