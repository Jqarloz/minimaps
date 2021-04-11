<?php

namespace App\Policies;

use App\Models\Menus\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    public function published(?User $user, Service $service)
    {
        if ($service->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
