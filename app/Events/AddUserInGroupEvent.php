<?php

namespace App\Events;

use App\Models\Group;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddUserInGroupEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $usersId;
    public array $params;
    public User $user;
    public Group $group;

    /**
     * ForgotPasswordEvent constructor.
     * @param User $user
     * @param Group $group
     * @param array $usersId
     * @param array $params
     */
    public function __construct(User $user, Group $group, array $usersId, array $params)
    {
        $this->user = $user;
        $this->group = $group;
        $this->usersId = $usersId;
        $this->params = $params;
    }
}
