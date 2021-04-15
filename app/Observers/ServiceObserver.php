<?php

namespace App\Observers;

use App\Models\Menus\Service;
use Illuminate\Support\Facades\Storage;

class ServiceObserver
{
    public function creating(Service $service) /* Accion para eliminar en consola */
    {
        if (! \App::runningInConsole()) {
            $service->user_id = auth()->user()->id;
        }
        
    }

   
    public function deleting(Service $service)
    {
        if ($service->image) {
           Storage::delete($service->image->url); 
        }
    }


}
