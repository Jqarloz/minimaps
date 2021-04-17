<?php

namespace App\Observers;

use App\Models\Menus\Job;
use Illuminate\Support\Facades\Storage;

class JobObserver
{
    public function creating(Job $job) /* Accion para eliminar en consola */
    {
        if (! \App::runningInConsole()) {
            $job->user_id = auth()->user()->id;
        }
        
    }

   
    public function deleting(Job $job)
    {
        if ($job->image) {
           Storage::delete($job->image->url); 
        }
    }
}
