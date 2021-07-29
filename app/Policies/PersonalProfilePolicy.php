<?php

namespace App\Policies;

use App\Models\PersonalProfile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonalProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, PersonalProfile $profile)
    {
        return $user->id === $profile->id;
    }

    public function delete(User $user, PersonalProfile $profile)
    {
        return $user->id === $profile->id;
    }
}
