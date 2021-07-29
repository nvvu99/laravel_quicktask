<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
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

    public function update(User $user, Skill $skill)
    {
        return $user->id === $skill->user_id;
    }

    public function delete(User $user, Skill $skill)
    {
        return $user->id === $skill->user_id;
    }
}
