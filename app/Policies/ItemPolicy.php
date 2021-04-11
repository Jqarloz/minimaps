<?php

namespace App\Policies;

use App\Models\Menus\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function published(?User $user, Item $item)
    {
        if ($item->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
