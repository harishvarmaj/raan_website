<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::with('role', 'extras', 'addresses')->where('role_id', '=', 4)->get();
        if ($users->isNotEmpty()) {
            return response()->json(['status' => '1', 'data' => $users]);
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
    public function store(User $user) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::with('extras', 'addresses')->find($id);
        if ($user) {
            return response()->json(['status' => '1', 'data' => $user]);
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
        
        $getUser = User::with('addresses')->find($id);
        if ($getUser) {
            if(request('profile_picture')) {
                $path=request('profile_picture')->store('profiles/' . $getUser['id']);
                request()->merge([ 'profile_image' => $path]);
            }
          
            $getUser->update(request()->all());
            $addresses = request('addresses');
            if ($addresses) {
                foreach ($addresses as $address) {
                    if (isset($address['is_deleted'])) {
                        $getUser->addresses()->get($address['id'])->delete();
                    } else {
                        $address['id'] = !empty($address['id']) ? $address['id'] : '';
                        $getUser->addresses()->updateOrCreate(
                                ['id' => $address['id']], $address
                        );
                    }
                }
            }
            return response()->json(['status' => '1', 'data' => $getUser]);
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
        //
    }

}
