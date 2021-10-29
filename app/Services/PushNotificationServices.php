<?php

namespace App\Services;

use App\Models\PushNotification as ModelPushNotification;
use Edujugon\PushNotification\PushNotification;

class PushNotificationServices
{
    protected PushNotification $push;

    public function __construct()
    {
        $this->push = new PushNotification('fcm');
    }

    public function sendPush(ModelPushNotification $pushNotification)
    {
        $data = [
            'notification' => [
                'title' => $pushNotification->title,
                'body' => $pushNotification->body,
                'sound' => 'default'
            ],
        ];

        if (!empty($pushNotification->data)) {
            $data['data'] = $pushNotification->data;
        }

        $this->push->setMessage($data)
            ->setDevicesToken($pushNotification->device_tokens)
            ->send();
    }

    public function getUnregisteredDeviceTokens(): array
    {
        return $this->push->getUnregisteredDeviceTokens();
    }
}
