<?php

namespace App\Policies;

use App\Models\Menus\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    public function author(User $user, Service $service) /* Metodo utilizado en controller Admin/ServiceController.edit */
    {
        if ($user->id == $service->user_id) {
            return true;
        } else {
            return false;
        }
    }

    public function published(?User $user, Service $service)
    {
        if ($service->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
