<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Referal;
use Illuminate\Support\Carbon;

class ReferalController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id=auth()->user()->id;
        $referals = Referal::where('user_id_to', '=', $user_id)->where('enable', '=', '1')->get();
        if ($referals->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $referals]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code) {
        $user_id=auth()->user()->id;
        if (!$code) {
            return response()->json(['status' => '0', 'error' => 'No results found.']);
        }
        $date = Carbon::now();
        $offers = Referal::where('code', $code)->where('user_id_to', $user_id)->where('completed','0')->first();
        if ($offers) {
            return response()->json(['status' => '1', 'data' => $offers]);
        }
        return response()->json(['status' => '0', 'error' => 'Invaild code']);
    }

  
}