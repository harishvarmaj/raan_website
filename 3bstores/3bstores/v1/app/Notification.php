<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
   

    /**
     * Send push notification to device
     *
     * @param  array $deviceIds        To send push notification
     * @param  array $notificationData For FCM
     * @param  array $additionalData   For application
     *
     * @return string
     */
    public static function pushNotifications(array $deviceIds, array $notificationData, array $additionalData = [])
    {
         $postData = [
            'registration_ids' => $deviceIds,
            'priority'         => 'high',
            // 'notification'     => $notificationData,
            'data'             => array_merge($notificationData, $additionalData)
        ];

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, [
            'Authorization: key=' . getenv('FCM_API_KEY'),
            'Content-Type: application/json'
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($postData));

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
