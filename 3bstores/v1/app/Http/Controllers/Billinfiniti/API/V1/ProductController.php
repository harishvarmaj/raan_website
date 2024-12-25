<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductImages;
use App\ProductVariantCombinations;

class ProductController extends Controller {
    
    
     public function customer(Request $request) {
         $products = Product::with('variantCombinations.userwishlist', 'images')
         ->where('status','1')
         ->with('variantCombinations.productVariantOption')
         ->get();
        if ($products->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $products]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']); 
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product) {
     

        $products = Product::with('variantCombinations.userwishlist', 'images')->with('variantCombinations.productVariantOption')->get();
        if ($products->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $products]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product) {
        DB::beginTransaction();
        try {
            $request->merge(['user_id' => '1']);
            $createProduct = $product->create(request()->all());
            if ($createProduct) {
                $productImages = request('images');
                if ($productImages) {
                    foreach ($productImages as $upload) {
                        $addImages[] = new ProductImages([
                            'name' => $upload['name'],
                            'path' => $upload['file']->store('products/' . $createProduct->id)
                        ]);
                    }
                    $createProduct->images()->saveMany($addImages);
                }
                $variantCombinations = request('variant_combinations');
                if ($variantCombinations) {
                    foreach ($variantCombinations as $combination) {
                        $addCombinations[] = new ProductVariantCombinations([
                            'product_variant_option_id' => $combination['product_variant_option_id'],
                            'in_stock' => $combination['in_stock'],
                            'quantity' => $combination['quantity'],
                            'price' => $combination['price'],
                            'mrp' => $combination['mrp']
                        ]);
                    }
                    $createProduct->variantCombinations()->saveMany($addCombinations);
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $createProduct]);
            }
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
        $product = Product::with('variantCombinations.userwishlist', 'images')->with('variantCombinations.productVariantOption')->find($id);
        if ($product) {
            return response()->json(['status' => '1', 'data' => $product]);
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
        $editProduct = Product::find($id);
        if ($editProduct) {
            DB::beginTransaction();
            try {
                $updateProduct = $editProduct->update(request()->all());
                $productImages = request('images');
                if ($productImages) {
                    foreach ($productImages as $upload) {
                        if(isset($upload['is_deleted'])) {
                            ProductImages::find($upload['id'])->delete();
                        } else {
                            $upload['id'] = !empty($upload['id']) ? $upload['id'] : '';
                            $editProduct->images()->updateOrCreate(
                                ['id' => $upload['id']], 
                                [
                                    'name' => $upload['name'], 
                                    'path' => !empty($upload['path']) ? $upload['path'] : $upload['file']->store('products/' . $editProduct->id)
                                ]
                            );
                        }
                    }
                }
                $variantCombinations = request('variant_combinations');
                if ($variantCombinations) {
                    foreach ($variantCombinations as $combination) {
                        $combination['id'] = !empty($combination['id']) ? $combination['id'] : '';
                        $editProduct->variantCombinations()->updateOrCreate(
                            ['id' => $combination['id']],
                            [
                            'product_variant_option_id' => $combination['product_variant_option_id'],
                            'in_stock' => $combination['in_stock'],
                            'quantity' => $combination['quantity'],
                            'price' => $combination['price'],
                            'mrp' => $combination['mrp']
                        ]);
                    }
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $updateProduct]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }            
        }
        return response()->json(['status' => '0', 'error' => "Invalid category information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroyProduct = Product::find($id);
        if ($destroyProduct) {
            $status = $destroyProduct->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid information passed"], 404);
    }

}
