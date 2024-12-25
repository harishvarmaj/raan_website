<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use App\User;
use App\UserExtra;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, User $user)
    {
        $attemptUser = $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
        if($attemptUser) {    

            $responseData = $user->loginUser();
            return response()->json(['status' => '1', 'data' => $responseData ]);
        }
        return response()->json(['status' => '0', 'error' => 'Invalid credentials provided.']);
    }

    /**
       * Get the needed authorization credentials from the request.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return array
       */
        protected function credentials(Request $request)
        {
          if(is_numeric($request->get('login'))){
            return ['phone'=>$request->get('login'),'password'=>$request->get('password')];
          }
          elseif (filter_var($request->get('login'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('login'), 'password'=>$request->get('password')];
          }
          return ['phone' => $request->get('login'), 'password'=>$request->get('password')];
        }
    public function deviceToken() {
        $getUser = User::with('extras')->where('id',request('id'))->get();
        if ($getUser->isNotEmpty()) {
            $getUser->extras->device_token = request('device_token');
            $getUser->save();
            return response()->json(['status' => '1', 'data' => 'success']);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(User $user,Request $request) {
        
        if($request->has('mobile')) 
        {
        $mobile=$request->mobile;
        $getUser = User::where('phone',$mobile)->first();
        }
        else
        $getUser = User::where('id', '=',auth('api')->user()->id)->first();
        if ($getUser) {
            $getUser->update(['password' => \Illuminate\Support\Facades\Hash::make(request('password'))]);
            return response()->json(['status' => '1', 'data' => 'success']);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(User $user,Request $request) {
        $checkUser = User::where('email', request('email'))->first();
        if ($checkUser) {
            $checkUser->forgot_password_token = Str::random(16);
            $checkUser->save();
         //   Mail::to($checkUser->email)->send(new \App\Mail\ForgotPassword($checkUser));
            return response()->json(['status' => '1', 'data' => 'Mail has been sent to your email','url' => url("/api/resetpassword/{$checkUser->forgot_password_token}")]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }

    public function resetPassword($token) {
        $checkUser = User::where('forgot_password_token', $token)->first();
        if ($checkUser) {
            $checkUser->update(['password' => \Illuminate\Support\Facades\Hash::make(request('password'))]);
            return response()->json(['status' => '1', 'data' => 'success']);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }
}
