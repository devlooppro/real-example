<?php

namespace App\Http\Controllers\Api;

use App\Events\AddUserInGroupEvent;
use App\Http\Requests\Api\Group\GroupAddUsersStore;
use App\Http\Requests\Api\Group\GroupFind;
use App\Http\Requests\Api\Group\GroupStore;
use App\Http\Requests\Api\Group\GroupUpdate;
use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Group\GroupStoreResource;
use App\Models\Group;
use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Repositories\Contracts\GroupUserRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class GroupController extends ApiBaseController
{
    protected GroupRepositoryInterface $groupRepository;
    protected GroupUserRepositoryInterface $groupUserRepository;
    protected UserRepositoryInterface $userRepository;

    /**
     * RegistrationController constructor.
     * @param Request $request
     * @param GroupRepositoryInterface $group
     * @param GroupUserRepositoryInterface $groupUser
     * @param UserRepositoryInterface $user
     */
    public function __construct(Request $request, GroupRepositoryInterface $group, GroupUserRepositoryInterface $groupUser, UserRepositoryInterface $user)
    {
        parent::__construct($request);
        $this->groupRepository = $group;
        $this->groupUserRepository = $groupUser;
        $this->userRepository = $user;
    }

    /**
     * @param GroupFind $request
     * @return AnonymousResourceCollection
     */
    public function index(GroupFind $request): AnonymousResourceCollection
    {
        $groups = $this->groupRepository->getUserGroups($this->user->id, $this->page, $this->perPage, ['groupMessages'], $request->find ?? '');

        return GroupResource::collection($groups);
    }

    /**
     * @param GroupStore $request
     * @return GroupResource
     */
    public function store(GroupStore $request): GroupResource
    {
        $group = $this->groupRepository->create($this->user->id, $request->getSanitized());

        AddUserInGroupEvent::dispatch($this->user, $group, $request->users_id, ['type' => 'addUserInGroup']);

        $this->userRepository->wereGroupTrue($request->users_id);

        return new GroupResource($group);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getFavorites(): AnonymousResourceCollection
    {
        $groups = $this->groupRepository->getFavorites($this->user->id, ['groupMessages']);

        return GroupResource::collection($groups);
    }

    /**
     * @param GroupUpdate $request
     * @param Group $group
     * @return GroupResource|JsonResponse
     * @throws AuthorizationException
     */
    public function update(GroupUpdate $request, Group $group): GroupResource
    {
        $this->authorize('update', $group);

        $group = $this->groupRepository->update($group, $request->getSanitized());

        return new GroupResource($group);
    }

    /**
     * @param GroupAddUsersStore $request
     * @param Group $group
     * @return GroupResource
     * @throws AuthorizationException
     */
    public function addUsers(GroupAddUsersStore $request, Group $group): GroupResource
    {
        $this->authorize('addUser', $group);
        $groups = $this->groupRepository->addUsers($request->users_id, $group, $this->user);

        $this->userRepository->wereGroupTrue($request->users_id);

        AddUserInGroupEvent::dispatch($this->user, $group, $request->users_id, ['type' => 'addUserInGroup']);

        return GroupResource::make($groups);
    }
}
