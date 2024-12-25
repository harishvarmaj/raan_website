<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ProductVariants;
use App\ProductVariantOptions;

class ProductVariantsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductVariants $productVariants) {
        $listVariants = $productVariants->with('variantOptions')->get();
        if ($listVariants->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $listVariants]);
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
    public function store(ProductVariants $productVariants) {
        DB::beginTransaction();
        try {
            request()->merge(['user_id' => '1']);
            $createVariant = $productVariants->create(request()->only('name', 'user_id'));
            $options = request('variant_options');
            if ($options) {
                foreach ($options as $option) {
                    $addOptions[] = new ProductVariantOptions([
                        'name' => $option['name'],
                        'product_variant_id' => $productVariants->id
                    ]);
                }
                $createVariant->variantOptions()->saveMany($addOptions);
            }
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createVariant]);
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
        $productVariants = ProductVariants::with('variantOptions')->find($id);
        if ($productVariants) {
            return response()->json(['status' => '1', 'data' => $productVariants]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid information passed"], 404);
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
        $getVariant = ProductVariants::with('variantOptions')->find($id);
        if ($getVariant) {
            DB::beginTransaction();
            try {
                request()->merge(['user_id' => '1']);
                $getVariant->update(request()->all());
                $options = request('variant_options');
                if ($options) {
                    foreach ($options as $option) {
                        $option['id'] = !empty($option['id']) ? $option['id'] : '';
                        $getVariant->variantOptions()->updateOrCreate(
                            ['id' => $option['id']], 
                            ['name' => $option['name'], 'product_variant_id' => $getVariant->id]
                        );
                    }                    
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => 'success']);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroyVariants = ProductVariants::find($id);
        if ($destroyVariants) {
            $status = $destroyVariants->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid pincode information passed"], 404);
    }

}
