<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;

use App\Models\Shop;

class ShopObserver
{
    public function creating(Shop $shop)
    {
        if (! \App::runningInConsole()) {
            $shop->user_id = auth()->user()->id;
        }
        
    }

    
   
    public function deleting(Shop $shop)
    {
        if ($shop->image) {
           Storage::delete($shop->image->url); 
        }
    }

    
}
