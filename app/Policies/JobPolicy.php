<?php

namespace App\Policies;

use App\Models\Menus\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function published(?User $user, Job $job)
    {
        if ($job->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
