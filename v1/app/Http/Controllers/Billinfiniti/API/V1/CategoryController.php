<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\CategoryImages;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category) {
        $categories = Category::with('products.variantCombinations.userwishlist','products.images','images') 
        ->with('products.variantCombinations.productVariantOption')->get();
        if ($categories->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $categories]);
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
    public function store(Request $request,Category $category) {
        DB::beginTransaction();
        try {
            $request->merge(['user_id' => '1']);
            $createCategory = $category->create($request->only('name', 'slug', 'description', 'user_id'));
            if ($createCategory) {
                $categoryImages = request('uploads');
                if ($categoryImages) {
                    foreach ($categoryImages as $upload) {
                        $addImages[] = new CategoryImages([
                            'name' => $upload['name'],
                            'path' => $upload['file']->store('categories/' . $createCategory->id)
                        ]);
                    }
                    try {
                        $createCategory->images()->saveMany($addImages);
                        DB::commit();
                        return response()->json(['status' => '1', 'data' => $createCategory]);
                    } catch (Exception $e) {
                        $delDir = \Illuminate\Support\Facades\Storage::deleteDirectory('categories/' . $createCategory->id);
                        DB::rollback();
                        return response()->json(['status' => '0', 'error' => $e->getMessage()], 500);
                    }
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $createCategory]);
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
        //
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
        $editCategory = Category::with('images')->find($id);

        if ($editCategory) {
            DB::beginTransaction();
            try {
                $updateCategory = $editCategory->update($request->all());
                if(request('images')) {
                    $images = request('images');
                    foreach ($images as $upload) {
                        if(isset($upload['is_deleted'])) {
                            CategoryImages::find($upload['id'])->delete();
                        } else {
                            $upload['id'] = !empty($upload['id']) ? $upload['id'] : '';
                            $editCategory->images()->updateOrCreate(
                                ['id' => $upload['id']], 
                                [
                                    'name' => $upload['name'], 
                                    'path' => !empty($upload['path']) ? $upload['path'] : $upload['file']->store('categories/' . $editCategory->id)
                                ]
                            );
                        }
                    }
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $updateCategory]);
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
        $destroyCategory = Category::find($id);
        if ($destroyCategory) {
            $status = $destroyCategory->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid category information passed"], 404);
    }

}
