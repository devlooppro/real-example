<?php

namespace App\Listeners;

use App\Events\AddUserInGroupEvent;
use App\Services\PushNotificationServices;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAddUserInGroupNotification implements ShouldQueue
{
    private PushNotificationServices $notificationServices;

    /**
     * Create the event listener.
     *
     * @param PushNotificationServices $notificationServices
     */
    public function __construct(PushNotificationServices $notificationServices)
    {
        $this->notificationServices = $notificationServices;
    }

    /**
     * @param AddUserInGroupEvent $event
     */
    public function handle(AddUserInGroupEvent $event)
    {
        //secret code
    }
}
