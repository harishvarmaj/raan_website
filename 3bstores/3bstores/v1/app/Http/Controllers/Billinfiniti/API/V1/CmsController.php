<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CmsPage;
use App\CmsImages;
use App\Offers;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CmsPage $cmsPage)
    {
        $cmsPages = $cmsPage->with('images', 'offers', 'user')->get();
        if ($cmsPages->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $cmsPages]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CmsPage $cmsPage)
    {
        DB::beginTransaction();
        try {
            request()->merge(['user_id' => 1]);
            $createPage = $cmsPage->create(request()->all());
            $images = request('images');
            if($images) {
                foreach ($images as $upload) {
                    $addImages[] = new CmsImages([
                        'name' => $upload['name'],
                        'path' => $upload['file']->store('cms/' . $createPage->id)
                    ]);
                }
                $createPage->images()->saveMany($addImages);
            }
            $offers = request('offers');
            if($offers) {
                foreach ($offers as $offer) {
                    $addOffers[] = new Offers($offer);
                }
                $createPage->offers()->saveMany($addOffers);
            }
            DB::commit();
            return response()->json(['status' => '1', 'data' => $createPage]);
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
    public function show($id)
    {
        $page = CmsPage::with('images', 'offers', 'user')->find($id);
        if ($page) {
            return response()->json(['status' => '1', 'data' => $page]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid information passed"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editPage = CmsPage::with('images', 'user')->find($id);
        if($editPage) {
            DB::beginTransaction();
            try {
                $editPage->update(request()->all());
                $images = request('images');
                if($images) {
                    foreach ($images as $upload) {
                        if(isset($upload['is_deleted'])) {
                            CmsImages::find($upload['id'])->delete();
                            $delDir = \Illuminate\Support\Facades\Storage::deleteDirectory($upload['path']);
                        } else {
                            $upload['id'] = !empty($upload['id']) ? $upload['id'] : '';
                            if(!empty($upload['file'])) {
                                $data = ['name' => $upload['name'], 'path' => $upload['file']->store('cms/' . $editPage->id)];
                            } else {
                                $data = ['name' => $upload['name'], 'path' => $upload['path']];
                            }
                            $editPage->images()->updateOrCreate(
                                ['id' => $upload['id']], 
                                $data
                            );
                        }
                    }
                }
                $offers = request('offers');
                if($offers) {                    
                    foreach ($offers as $offer) {
                        if(isset($offer['is_deleted'])) {
                            Offers::find($offer['id'])->delete();
                        } else {
                            $offer['id'] = !empty($offer['id']) ? $offer['id'] : '';                            
                            $editPage->offers()->updateOrCreate(
                                ['id' => $offer['id']], 
                                $offer
                            );
                        }
                    }
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $editPage->refresh()]);
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
    public function destroy($id)
    {
        $destroyPage = CmsPage::find($id);
        if ($destroyPage) {
            $status = $destroyPage->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid information passed"], 404);
    }
}
