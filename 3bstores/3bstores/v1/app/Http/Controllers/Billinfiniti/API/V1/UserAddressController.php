<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Address;

class UserAddressController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Address $address) {
        $addresss = Address::where('user_id', auth()->user()->id)->get();
        if ($addresss->isNotEmpty()){
            return response()->json(['status' => '1', 'data' => $addresss]);
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
    public function store(Address $address) {
        DB::beginTransaction();
        try {
            request()->merge(['user_id' => auth()->user()->id]);
            $createAddress = $address->create(request()->all());
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createAddress]);
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
    public function show($id) {
        $address = Address::find($id)->where('user_id', auth()->user()->id)->get();
        if ($address->isNotEmpty()){
            return response()->json(['status' => '1', 'data' => $address]);
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
        $address = Address::find($id)->where('user_id', auth()->user()->id)->first();
        if ($address) {
            DB::beginTransaction();
            try {
                $updateAddress = $address->update(request()->all());
                DB::commit();
                return response()->json(['status' => '1', 'data' => $address]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid address information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroyAddress = Address::find($id);
        if ($destroyAddress) {
            $status = $destroyAddress->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid address information passed"], 404);
    }

}