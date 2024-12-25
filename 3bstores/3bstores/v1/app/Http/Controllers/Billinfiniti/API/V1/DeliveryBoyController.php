<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\DeliveryBoy;
use App\DeliveryBoysDocuments;
use Illuminate\Support\Str;

class DeliveryBoyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DeliveryBoy $deliveryBoy) {
        $deliveryBoys = $deliveryBoy->with('user.addresses', 'documents')->get();
        if ($deliveryBoys->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $deliveryBoys]);
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
    public function store(DeliveryBoy $deliveryBoy, \App\User $user) {
        DB::beginTransaction();
        try {
             $email=request()->email;
             $phone = request()->phone;
             $user =User::where('email',$email) ->orWhere('phone',$phone)->first();
            if($user == null)
            {
            $phone = substr($phone, 5);
            $api_token= Str::uuid();
            
            request()->merge([ 'api_token' => $api_token,'password' => \Illuminate\Support\Facades\Hash::make($phone), 'role_id' => 2]);

            $addDeliveryBoy = User::create(request()->all());

            request()->merge(['user_id' => $addDeliveryBoy->id]);
            $createDeliveryboy = $deliveryBoy->create(request()->only('license_number', 'rc_book_number', 'address', 'user_id'));
            if ($createDeliveryboy) {
                $deliveryDocuments = request('uploads');
                if ($deliveryDocuments) {
                    foreach ($deliveryDocuments as $upload) {
                        $uploadDocuments[] = new DeliveryBoysDocuments([
                            'name' => $upload['name'],
                            'path' => $upload['file']->store('delivery_boys/' . $createDeliveryboy->id)
                        ]);
                    }
                    try {
                        $createDeliveryboy->documents()->saveMany($uploadDocuments);
                        DB::commit();
                        return response()->json(['status' => '1', 'data' => $createDeliveryboy, 'phone' => $phone]);
                    } catch (Exception $e) {
                        $delDir = \Illuminate\Support\Facades\Storage::deleteDirectory('delivery_boys/' . $createDeliveryboy->id);
                        DB::rollback();
                        return response()->json(['status' => '0', 'error' => $e->getMessage()], 500);
                    }
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $createDeliveryboy]);
            }
            
            }
            else
            {
            return response()->json(['status' => '0', 'error' => 'Mobile/Email already exists!']);    
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
        $deliveryBoy = DeliveryBoy::with('user.addresses', 'documents')->find($id);
        if ($deliveryBoy) {
            return response()->json(['status' => '1', 'data' => $deliveryBoy]);
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
//        return response()->json(['status' => '1', 'data' => request()->only('user.phone', 'user.description', 'user.email')]);
        $editDeliveryBoy = DeliveryBoy::with('documents', 'user')->find($id);
//        return response()->json(['status' => '1', 'data' => $editDeliveryBoy]);
        if ($editDeliveryBoy) {
            DB::beginTransaction();
            try {
                $editDeliveryBoy->update(request()->only('license_number', 'rc_book_number'));
                $updateData = ['phone' => request('user.phone'), 'email' => request('user.email'), 'phone' => request('user.phone')];
                $editDeliveryBoy->user()->update($updateData);
                if (request('documents')) {
                    $addImages = [];
                    $uploads = request('documents');
                    foreach ($uploads as $upload) {
                        if(isset($upload['is_deleted'])) {
                            DeliveryBoysDocuments::find($upload['id'])->delete();
                            $delDir = \Illuminate\Support\Facades\Storage::deleteDirectory($upload['path']);
                        } else {
                            $upload['id'] = !empty($upload['id']) ? $upload['id'] : '';
                            if(!empty($upload['file'])) {
                                $data = ['name' => $upload['name'], 'path' => $upload['file']->store('delivery_boys/' . $editDeliveryBoy->id)];
                            } else {
                                $data = ['name' => $upload['name'], 'path' => $upload['path']];
                            }
                            $editDeliveryBoy->documents()->updateOrCreate(
                                ['id' => $upload['id']], 
                                $data
                            );
                        }
                    }
                }
                DB::commit();
                return response()->json(['status' => '1', 'data' => $editDeliveryBoy->refresh()]);
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
        $destroyDeliveryBoy = DeliveryBoy::find($id);
        if ($destroyDeliveryBoy) {
            $status = $destroyDeliveryBoy->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid category information passed"], 404);
    }

}
