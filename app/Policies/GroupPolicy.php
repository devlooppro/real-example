<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Group $group
     * @return bool
     */
    public function update(User $user, Group $group): bool
    {
        return (bool)$user->inGroup($group->id);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Group $group
     * @return bool
     */
    public function addUser(User $user, Group $group): bool
    {
        return (bool)$user->inGroup($group->id);
    }
}
