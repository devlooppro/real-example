<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @param array $attributes
     * @return User
     */
    public function update(User $user, array $attributes): User;

    /**
     * @param int $userId
     * @param int $duration
     * @return User|null
     */
    public function addMinutesTalk(int $userId, int $duration): ?User;

    /**
     * @param User $user
     * @param int $durationCall
     * @return User
     */
    public function removeMinutesTalk(User $user, int $durationCall): User;

    /**
     * @param array $users
     * @return bool
     */
    public function wereGroupTrue(array $users): bool;
}
