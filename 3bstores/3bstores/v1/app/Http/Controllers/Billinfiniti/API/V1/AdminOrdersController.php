<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;

class AdminOrdersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order) {
        $orders = Order::with('orderItems.productCombinations.product.images', 'address','user')->get();
        if ($orders->isNotEmpty()){
            return response()->json(['status' => '1', 'data' => $orders]);
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
    public function store(Request $request) {
        $employee_id=$request->employee_id;
        $date=$request->date;
        $status=$request->status;
        

         $query = Order::with('orderItems.productCombinations.product.images', 'address','user');
         if(!empty($date)) {
            $query->whereDate('created_at', '=', $date);
          }
           if(!empty($employee_id)) {
            $query->where('delivery_boy_id', '=', $employee_id);
          }
          if(!empty($status)) {
            $query->where('order_status', '=', $status);
          }
          
          $orders=$query ->get();
          
        if ($orders->isNotEmpty()){
            return response()->json(['status' => '1', 'data' => $orders]);
        }
        return response()->json(['status' => '0', 'error' => 'No results found.']);

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
       $orders = Order::with('orderItems.productCombinations.product.images', 'address','user')->where('user_id', $id)->get();
        if ($orders->isNotEmpty()){
            return response()->json(['status' => '1', 'data' => $orders]);
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
        $order = Order::find($id);
        if ($order) {
            DB::beginTransaction();
            try {
                $updateOrder = $order->update(request()->only('order_status', 'delivery_boy_id','cancelled_reason', 'cancelled_at'));

                DB::commit();
                return response()->json(['status' => '1', 'data' => $order]);
            } catch (Exception $ex) {
                DB::rollback();
                return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
            }
        }
        return response()->json(['status' => '0', 'error' => "Invalid order information passed"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $destroyOrder = Order::find($id);
        if ($destroyOrder) {
            $status = $destroyOrder->delete();
            return response()->json(['status' => '1', 'data' => $status]);
        }
        return response()->json(['status' => '0', 'error' => "Invalid order information passed"], 404);
    }

}
