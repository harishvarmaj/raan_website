<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserExtras;
use Carbon\Carbon;


class OtpController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($input) {
       
    }
    
    public function verifyMobile(Request $request)
    {
        
        if($request->has('mobile')) 
        {
        $mobile=$request->mobile;
        $user = User::where('phone',$mobile)->first();
          $getUser = UserExtras::where('user_id','=', $user->id)->where('otp',$request->otp)->first();   
        }
        else
        $getUser = UserExtras::where('user_id','=', auth('api')->user()->id)->where('otp',$request->otp)->first();
              //  return response()->json(['status' => '0', 'error' => $getUser]);


        if ($getUser) 
        {
        $current_date_time = Carbon::now()->toDateTimeString(); 
        if($request->has('mobile')) 
                $getUser = User::where('phone',$mobile)->first();
         else 
        $getUser = User::where('id', '=', auth('api')->user()->id )->first();
        if ($getUser) {
            $getUser->update(['phone_verified_at' => $current_date_time]);
            return response()->json(['status' => '1', 'data' => 'success']);
        }
        }
        return response()->json(['status' => '0', 'error' => 'Wrong OTP!']);
    }
    
    
    
    public function store(Request $request)
    {
        $pin = mt_rand(1000, 9999);
        $action=$request->action;
        $mobile=$request->mobile;
        
        if($action == 'forget_password')
        {
               $mobile=$request->mobile;
               $user = User::where('phone',$mobile)
                        ->first();

               if($user == null)
                        return response()->json(['status' => '0', 'data' => 'This mobile is not registered with us!']);
            else
                $messagecontent='Oilkart verification code is: '.$pin;
        }
        
        else if($action == 'change_mobile')
        {
              $user_id=auth('api')->user()->id;
               $user = User::whereNotIn('id', [$user_id])
                        ->where('phone',$mobile)
                        ->first();

               if($user != null)
                        return response()->json(['status' => '0', 'data' => 'This mobile already registered!']);
            else
                $messagecontent='Oilkart verification code is: '.$pin;
        }
        else if($action == 'register')
            $messagecontent='Welcome to oilkart. Your verification code is '.$pin.' . Thank you for joining with us.';
        else
            $messagecontent='Oilkart verification code is: '.$pin;

 
        $data=$this->sendOtp($mobile,$pin);
       // $data=55;

      if(is_numeric($data))
      {
              if($action == 'forget_password')
              {
                  $user = User::with('extras')->where('phone',$mobile)->first();
              }
              else
              {
                   $user_id=auth('api')->user()->id;
                   $user = User::with('extras')->find($user_id);
              }
              $extra_id= isset($user->extras->id) ? $user->extras->id : '';
              if($extra_id == '')
              {
                   $obj=new UserExtras();  
                   $obj->user_id=$user_id;
                   $obj->otp=$pin;
                   $obj->save();
              }
              else
              {
              $updateUser =UserExtras::updateOrCreate(
                        ['id' => $extra_id], 
                        ['otp' => $pin]
                        );
              }
           
              return response()->json(['status' => '1', 'data' => 'OTP sent to your mobile!']);
      }
       else
              return response()->json(['status' => '0', 'error' => $data]);

        
    }
    
    
    
   
   
    
    
}