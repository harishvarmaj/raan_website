<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Cart;

class GuestCartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart) {
     
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
    public function store(Cart $cart) {
        DB::beginTransaction();
        try {
            $createCart = $cart->create(request()->all());
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createCart]);
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
        $carts = Cart::with('productCombinations.product.images')->where('guest_cart_id', $id)->get();
        if ($carts->isNotEmpty()) {
            $extra['total_price'] = $carts->sum(function ($cart) {
                return $cart->productCombinations->sum('product_variant_combinations.price');
            });
            return response()->json(['status' => '1', 'data' => $carts, 'extra' => $extra]);
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
        $cart = Cart::with('productCombinations.product')->find($id);
        if ($cart) {
            DB::beginTransaction();
            try {
                $updateCart = $cart->update(request()->all());
                DB::commit();
                return response()->json(['status' => '1', 'data' => $cart]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid cart information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $destroyCart = Cart::find($id);
        if ($destroyCart) {
            $status = $destroyCart->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid cart information passed"], 404);
       
    }

  

}