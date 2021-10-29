<?php

namespace App\Broadcasting;

use App\Models\User;

class UserChannel
{
    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @param string $userId
     * @return bool
     */
    public function join(User $user, string $userId): bool
    {
        return (bool)$user->id == $userId;
    }
}
