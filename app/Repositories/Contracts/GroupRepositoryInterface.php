<?php

namespace App\Repositories\Contracts;

use App\Models\Group;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GroupRepositoryInterface
{
    /**
     * @param int $userId
     * @param array $attributes
     * @return Group
     */
    public function create(int $userId, array $attributes): Group;

    /**
     * @param int $groupId
     * @return Group|null
     */
    public function getGroup(int $groupId): ?Group;

    /**
     * @param Group $group
     * @return bool
     */
    public function destroy(Group $group): bool;

    /**
     * @param Group $group
     * @param array $attributes
     * @return Group
     */
    public function update(Group $group, array $attributes): Group;

    /**
     * @param array $usersId
     * @param Group $group
     * @param User $user
     * @return Group
     */
    public function addUsers(array $usersId, Group $group, User $user): Group;

    /**
     * @param int $userId
     * @param int $page
     * @param int $perPage
     * @param array $with
     * @param string $find
     * @return LengthAwarePaginator
     */
    public function getUserGroups(int $userId, int $page, int $perPage, array $with = [], string $find = ''): LengthAwarePaginator;

    /**
     * @param int $userId
     * @param array $with
     * @return LengthAwarePaginator
     */
    public function getFavorites(int $userId, array $with = []): LengthAwarePaginator;

    /**
     * @param int $groupId
     * @param int $userId
     * @return Group
     */
    public function groupInfo(int $groupId, int $userId): Group;
}
