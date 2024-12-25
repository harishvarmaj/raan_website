<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Wishlist;

class WishlistController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Wishlist $wishlist) {
        $wishlists = Wishlist::with('productCombinations.enabledProducts.images')
        ->with('productCombinations.productVariantOption')
        ->where('user_id', auth()->user()->id)->get();
        if ($wishlists){
            return response()->json(['status' => '1', 'data' => $wishlists]);
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
    public function store(Wishlist $wishlist) {
//        dd(request()->all());
        DB::beginTransaction();
        try {
            request()->merge(['user_id' => auth()->user()->id]);
            $createWishlist = $wishlist->create(request()->all());
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createWishlist]);
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
        $wishlist = Wishlist::find($id)->with('productCombinations.product')->where('user_id', auth()->user()->id)->get();
        if ($wishlist){
            return response()->json(['status' => '1', 'data' => $wishlist]);
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
        $wishlist = Wishlist::with('productCombinations.product')->find($id);
        if ($wishlist) {
            DB::beginTransaction();
            try {
                $updateWishlist = $wishlist->update(request()->all());
                DB::commit();
                return response()->json(['status' => '1', 'data' => $wishlist]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid wishlist information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroyWishlist = Wishlist::find($id);
        if ($destroyWishlist) {
            $status = $destroyWishlist->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid wishlist information passed"], 404);
    }

}
