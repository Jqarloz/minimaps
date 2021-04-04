<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;

use App\Models\Shop;

class ShopObserver
{
    public function created(Shop $shop)
    {
        //
    }

    
   
    public function deleting(Shop $shop)
    {
        if ($shop->image) {
           Storage::delete($shop->image->url); 
        }
    }

    
}
