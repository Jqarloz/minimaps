<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Shop $shop)
    {
        if ($user->id == $shop->user_id) {
            return true;
        } else {
            return false;
        }
    }

    public function published(?User $user, Shop $shop)
    {
        if ($shop->status == 2) {
            return true;
        } else {
            return false;
        }
        
    }
}
