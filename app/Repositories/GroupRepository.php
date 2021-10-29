<?php

namespace App\Repositories;

use App\Models\Group;
use App\Models\User;
use App\Repositories\Contracts\GroupRepositoryInterface;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class GroupRepository implements GroupRepositoryInterface
{
    /**
     * @inheritDoc
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function create(int $userId, array $attributes): Group
    {
        $group = new Group();
        //secret code

        $group->save();

        //secret code

        return $group;
    }

    /**
     * @inheritDoc
     */
    public function getGroup(int $groupId): ?Group
    {
        return Group::find($groupId);
    }

    /**
     * @inheritDoc
     */
    public function destroy(Group $group): bool
    {
        //secret code
    }

    /**
     * @inheritDoc
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Group $group, array $attributes): Group
    {
        //secret code
    }

    /**
     * @inheritDoc
     */
    public function addUsers(array $usersId, Group $group, User $user): Group
    {
        //secret code
    }

    /**
     * @inheritDoc
     */
    public function getUserGroups(int $userId, int $page, int $perPage, array $with = [], string $find = ''): LengthAwarePaginator
    {
        //secret code
    }

    /**
     * @inheritDoc
     */
    public function getFavorites(int $userId, array $with = []): LengthAwarePaginator
    {
        //secret code
    }

    /**
     * @inheritDoc
     */
    public function groupInfo(int $groupId, int $userId): Group
    {
        //secret code
    }
}
