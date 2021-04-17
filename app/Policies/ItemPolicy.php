<?php

namespace App\Policies;

use App\Models\Menus\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Item $item) /* Metodo utilizado en controller Admin/ItemController.edit */
    {
        if ($user->id == $item->user_id) {
            return true;
        } else {
            return false;
        }
    }

    public function published(?User $user, Item $item)
    {
        if ($item->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
