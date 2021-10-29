<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(User $user, array $attributes): User
    {
        //secret code

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function addMinutesTalk(int $userId, int $duration): ?User
    {
        //secret code
    }

    /**
     * @inheritDoc
     */
    public function removeMinutesTalk(User $user, int $durationCall): User
    {
        //secret code

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function wereGroupTrue(array $users): bool
    {
        //secret code

        return true;
    }
}
