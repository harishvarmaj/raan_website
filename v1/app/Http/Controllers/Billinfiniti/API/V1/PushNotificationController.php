<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserExtras;
use App\User;


class PushNotificationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject=$request->subject;
        $message=$request->message;
        $role_id=$request->role_id;

        
        $user_ids=User::where('role_id', $role_id)->pluck('id')->toArray();;
        $device_ids=UserExtras::whereIn('user_id', $user_ids)-> where('device_token','!=',null) ->pluck('device_token')->toArray();;
        $count = count($device_ids);
        
        if($count>0)
        {
        $this->sendPushNotifications(
			$device_ids,
			[
				'text'  => $message,
				'title' => $subject,
			],
			['extra'  => 'This is for future' ]
	   	); 
	   	        return response()->json(['status' => '1', 'data' => 'Success']);    

        }
        else
                return response()->json(['status' => '1', 'error' => 'Device Id not found!']);    

		
       
    }
}