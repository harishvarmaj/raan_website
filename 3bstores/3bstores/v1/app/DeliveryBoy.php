<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryBoy extends Model {

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_number', 'rc_book_number', 'address', 'user_id','role_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function documents() {
        return $this->hasMany(DeliveryBoysDocuments::class, 'delivery_boy_id');
    }

    public function updateDeliveryBoy() {
        DB::beginTransaction();
        try {
//            $updateDeliveryBoy = $this->update(request()->only('license_number', 'rc_book_number', 'address'));
            $this->update(request()->only('license_number', 'rc_book_number', 'address'));
            $this->user()->update(request()->only('name', 'email', 'phone', 'id'));
            if (request('documents')) {
                $addImages = [];
                $uploads = request('documents');
                foreach ($uploads as $upload) {
                    if (isset($upload['is_deleted'])) {
                        DeliveryBoysDocuments::find($upload['id'])->delete();
                        $delDir = \Illuminate\Support\Facades\Storage::deleteDirectory($upload['path']);
                    } else {
                        if (isset($upload['file'])) {
                            $addImages[] = new DeliveryBoysDocuments([
                                'name' => $upload['name'],
                                'path' => $upload['file']->store('delivery_boys/' . $this->id)
                            ]);
                        }
                    }
                }
                if ($addImages) {
                    try {
                        $updateDeliveryBoy->documents()->saveMany($addImages);
                        DB::commit();
                        return response()->json(['status' => '1', 'data' => $this]);
                    } catch (Exception $e) {
                        $delDir = \Illuminate\Support\Facades\Storage::deleteDirectory('delivery_boys/' . $this->id);
                        DB::rollback();
                        return response()->json(['status' => '0', 'error' => $e->getMessage()], 500);
                    }
                }
            }
            DB::commit();
            return response()->json(['status' => '1', 'data' => $this]);
        } catch (Exception $ex) {
            DB::rollback();
            return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
        }
    }
}
