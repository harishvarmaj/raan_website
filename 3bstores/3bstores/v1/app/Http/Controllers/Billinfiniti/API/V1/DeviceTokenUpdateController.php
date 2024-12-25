<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;

class DeviceTokenUpdateController extends Controller {

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(!request('device_token')){
            return response()->json(['status' => '0', 'error' => "Device token is missing"], 404);
        }
        $id=$request->user_id;
        $user = User::with('extras')->find($id);
        if ($user) {
            DB::beginTransaction();
            try {
                $upload['id'] = isset($user->extras->id) ? $user->extras->id : '';
//                return response()->json(['status' => '1', 'data' => $upload['id']]);
                $updateUser = $user->extras()->updateOrCreate(
                        ['id' => $upload['id']], 
                        ['device_token' => request('device_token')]
                        );
                DB::commit();
                return response()->json(['status' => '1', 'data' => $user->refresh()]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid user information passed"], 404);
    }

}
