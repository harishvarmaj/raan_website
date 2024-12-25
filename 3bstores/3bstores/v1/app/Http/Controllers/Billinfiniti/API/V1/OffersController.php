<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Offers;

class OffersController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code) {
        if (!$code) {
            return response()->json(['status' => '0', 'error' => 'No results found.']);
        }
        $date = Carbon::now();
        $offers = Offers::where('code', $code)->where('expiry_date', '>', $date)->first();
        if ($offers) {
            return response()->json(['status' => '1', 'data' => $offers]);
        }
        return response()->json(['status' => '0', 'error' => 'Invaild code']);
    }
}
