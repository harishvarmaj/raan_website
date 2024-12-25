<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SpecialProducts;

class SpecialProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null) {        
        $specialProducts = SpecialProducts::with('productCombinations.enabledProducts.images')
         ->with('productCombinations.productVariantOption')
        ->get();
        if($type) {            
            $specialProducts = SpecialProducts::where('type', $type)->with('productCombinations.enabledProducts.images')
             ->with('productCombinations.productVariantOption')
             ->get();
        }
        if ($specialProducts->isNotEmpty()){
            return response()->json(['status' => '1', 'data' => $specialProducts]);
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
    public function store(SpecialProducts $specialProducts) {
        DB::beginTransaction();
        try {
            request()->merge(['user_id' => auth()->user()->id]);
            $createSpecialProducts = $specialProducts->create(request()->all());
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createSpecialProducts]);
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
        $specialProducts = SpecialProducts::find($id)->with('productCombinations.enabledProducts')->where('user_id', auth()->user()->id)->get();
        if ($specialProducts){
            return response()->json(['status' => '1', 'data' => $specialProducts]);
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
        $specialProducts = SpecialProducts::with('productCombinations.product')->find($id);
        if ($specialProducts) {
            DB::beginTransaction();
            try {
                $updateSpecialProducts = $specialProducts->update(request()->all());
                DB::commit();
                return response()->json(['status' => '1', 'data' => $specialProducts]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid specialProducts information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroySpecialProducts = SpecialProducts::find($id);
        if ($destroySpecialProducts) {
            $status = $destroySpecialProducts->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid specialProducts information passed"], 404);
    }

}
