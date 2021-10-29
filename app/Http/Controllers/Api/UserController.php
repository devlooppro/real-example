<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\User\UserUpdate;
use App\Http\Resources\UserIndexResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends ApiBaseController
{
    protected UserRepositoryInterface $userRepository;

    /**
     * RegistrationController constructor.
     * @param Request $request
     * @param UserRepositoryInterface $user
     */
    public function __construct(Request $request, UserRepositoryInterface $user)
    {
        parent::__construct($request);
        $this->userRepository = $user;
    }

    /**
     *
     * @return UserIndexResource
     */
    public function index(): UserIndexResource
    {
        return new UserIndexResource($this->user);
    }

    /**
     * @param UserUpdate $request
     * @return UserIndexResource
     */
    public function update(UserUpdate $request): UserIndexResource
    {
        $user = $this->userRepository->update($this->user, $request->getSanitized());

        return new UserIndexResource($user);
    }
}
