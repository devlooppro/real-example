<?php

namespace App\Listeners\Sockets;

use App\Repositories\Contracts\UserRepositoryInterface;
use BeyondCode\LaravelWebSockets\Events\WebSocketMessageReceived;

class ReceiveMessage
{
    protected UserRepositoryInterface $userRepository;

    /**
     * RegistrationController constructor.
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->userRepository = $user;
    }

    /**
     * @param WebSocketMessageReceived $event
     */
    public function handle(WebSocketMessageReceived $event)
    {
        //secret code
    }
}
