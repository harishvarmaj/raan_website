<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Referal;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->email;
        $phone=$request->phone;
        $referal='';
        if ($request->has('referal'))
        $referal=$request->referal;
        $api_token= Str::uuid();
        
        $user =User::where('email',$email) ->orWhere('phone',$phone)->first();
        if($user == null)
        {
        request()->merge([ 'api_token' => $api_token,'password' => \Illuminate\Support\Facades\Hash::make(request('password')), 'role_id' => 4]);
        if(strlen($referal) > 0)
        {
           $obj=new Referal();    
           $refUserId=substr($referal,5);
           $obj->user_id_to=$refUserId;
            $refUser =User::where('id',$refUserId)->first();
            if($refUser == null)
                return response()->json(['status' => '0', 'error' => 'Promo code is wrong!']);    
           else
           {
           $createUser = User::create(request()->all());
           $obj->user_id_from=$createUser->id;
           $obj->code='REF'.$obj->user_id_from;
           $obj->discount='5';
           $obj->max_amount='50';
           $obj->min_cart_amount='50';
           $obj->title='REFERAL BONUS';
           $obj->description='You are getting this for successful purchased by your friend '.$createUser->name;
           $obj->enable='0';
           $obj->save();
           }
        }
        else
          $createUser = User::create(request()->all());

        return response()->json(['status' => '1', 'data' => $createUser]);    
        }
        else
        {
          return response()->json(['status' => '0', 'error' => 'Mobile/Email already exists!']);    
        }
    }
    
    
}
