<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\ProductVariantCombinations;

class SearchController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($input) {
        if (!$input) {
            return response()->json(['status' => '0', 'error' => 'No results found.']);
        }
        $categoryIds = Category::where('name', 'like', '%' . $input . '%')->pluck('id');
        $products =  Product::with('variantCombinations.userwishlist', 'images')->with('variantCombinations.productVariantOption')
                ->whereIn('category_id', $categoryIds)
                 ->where('status','1')
                ->orWhere(function ($query) use ($input) {
                    $query->where('name', 'like', '%' . $input . '%')
                    ->orWhere('brand', 'like', '%' . $input . '%')
                    ->orWhere('description', 'like', '%' . $input . '%');
                })
                ->get();
        if ($products->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $products]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }
    
    
    
    public function store(Request $request)
    {
        
        $min_price=$request->min_price;
        $max_price=$request->max_price;
        $sort_by_price='desc'; 
        
        $sort_by_field='';
        $sort_by='';
        $product_ids='';
        
        if($request->has('sort_by')) 
        {
            $sort_by_field=$request->sort_by_field;
            $sort_by=$request->sort_by; 
        }
        
        

        if($request->has('category_id')) 
        {
          $category_id=$request->category_id;  
          $product_ids = Product::where('category_id', '=',$category_id)->pluck('id');
        }
        else
        {
            $input=$request->keyword;  
            if ($input == '') {
                $product_ids =  Product::where('status','1')->pluck('id'); 
             }
             else
             {
        $categoryIds = Category::where('name', 'like', '%' . $input . '%')->pluck('id');
        $product_ids =  Product::whereIn('category_id', $categoryIds)
                 ->where('status','1')
                ->orWhere(function ($query) use ($input) {
                    $query->where('name', 'like', '%' . $input . '%')
                    ->orWhere('brand', 'like', '%' . $input . '%')
                    ->orWhere('description', 'like', '%' . $input . '%');
                })
                ->pluck('id');}
        }
      
        
       
        
        if($sort_by_field == '' || $sort_by == '') 
          $products = ProductVariantCombinations::with('enabledProducts.images','productVariantOption','userwishlist')
                        ->whereBetween('price', [$min_price, $max_price])
                        ->whereIn('product_id', $product_ids)
                        ->get();
        
        else
        $products = ProductVariantCombinations::with('enabledProducts.images','productVariantOption','userwishlist')
                        ->whereBetween('price', [$min_price, $max_price])
                        ->whereIn('product_id', $product_ids)
                        ->orderBy($sort_by_field, $sort_by)
                        ->get();
        
             
             

         if ($products->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $products]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
        
    }
}
