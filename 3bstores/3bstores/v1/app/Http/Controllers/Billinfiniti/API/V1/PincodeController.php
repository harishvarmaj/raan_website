<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Pincode;

class PincodeController extends Controller {
    
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pincode $pincode) {
        $pincodes = $pincode->all();
        if ($pincodes->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $pincodes]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pincode $pincode) {
        DB::beginTransaction();
        try {
            request()->merge(['user_id' => 1]);
            $createPincode = $pincode->create(request()->all());
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createPincode]);
        } catch (Exception $ex) {
            DB::rollback();
            return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code) {
        $pincodes = Pincode::where('pincode',$code)->first();
        if ($pincodes) {
            return response()->json(['status' => '1', 'data' => $pincodes]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $pincode = Pincode::find($id);
        if ($pincode) {
            DB::beginTransaction();
            try {
                $updatePincode = $pincode->update(request()->all());
                DB::commit();
                return response()->json(['status' => '1', 'data' => $pincode]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid pincode information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroyPincode = Pincode::find($id);
        if ($destroyPincode) {
            $status = $destroyPincode->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid pincode information passed"], 404);
    }

}
