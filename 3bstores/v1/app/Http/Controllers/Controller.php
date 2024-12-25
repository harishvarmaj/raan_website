<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Notification;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    /**
	 * Send push notification to device
	 *
	 * @param  array $deviceIds        To send push notification
	 * @param  array $notificationData For FCM
	 * @param  array $additionalData   For application
	 *
	 * @return string
	 */
	public function sendPushNotifications(array $deviceIds, array $notificationData, array $additionalData = [])
	{
		return Notification::pushNotifications($deviceIds, $notificationData, $additionalData);
	}
	
	
	public function sendOtp1($mobile,$messagecontent)
   {
        $username = "oilkrt";
        $password = "oilkrt";
        $sender = "OILKRT";
        $username = urlencode($username);
        $password = urlencode($password);
        $sender = urlencode($sender);
        $message = urlencode($messagecontent);
        $url="http://bulksms.glg.co.in/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
   }
   
   public function sendOtp($mobileNumber,$otp)
	{
	 $authKey = "251558Ao4RkZ9k5c232725";
	 $senderId = "REBOXX";
	 $message = "Rebox verification code is ".$otp;
	 $route = "default";
	 
	 $api= 'http://control.msg91.com/api/sendotp.php?authkey='.$authKey.
	 '&message='.$message.
	 '&sender='. $senderId.
	 '&mobile=91'.$mobileNumber.
	 '&otp='.$otp;

	  $curl = curl_init();
	  
	  curl_setopt_array($curl, array(
  CURLOPT_URL => $api,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$resp = curl_exec($curl);
$err = curl_error($curl);

 if ($err) 
		    return $err;
               else 
		  
        	    return 1;
               


curl_close($curl);

            
	
   }

   
}
