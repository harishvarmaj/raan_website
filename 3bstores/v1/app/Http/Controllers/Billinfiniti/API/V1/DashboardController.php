<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Order;
use App\DeliveryBoy;
use App\User;

class DashboardController extends Controller {

  
    public function index() {
        $sales = Order::where('order_status', '=','Delivered')->sum('total');
        $delivered = Order::where('order_status', '=','Delivered')->count();
        $assigned= Order::where('order_status', '=','Assigned')->count();
        $pending = Order::where('order_status', '=','Pending')->count();
        $processed = Order::where('order_status', '=','Processed')->count();
        $dispatched = Order::where('order_status', '=','Dispatched')->count();
        $cancelled = Order::where('order_status', '=','Cancelled')->count();
        $delivery_boy = DeliveryBoy::count();
        $users = User::count();

  $data = [ 'sales' => $sales,
               'delivered' => $delivered,
               'pending' => $pending,
               'processed' => $processed,
               'dispatched' => $dispatched,
               'assigned' => $assigned,
               'cancelled' => $cancelled,
               'delivery_boy' => $delivery_boy,
               'users' => $users
  ];

        return response()->json(['status' => '1', 'data' => $data]);
        
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
         $delivered = Order::where('order_status', '=','Delivered')
         ->where('delivery_boy_id',$id)
         ->count();
        $assigned= Order::where('order_status', '=','Assigned')
        ->where('delivery_boy_id',$id)
        ->count();
        $dispatched = Order::where('order_status', '=','Dispatched')
        ->where('delivery_boy_id',$id)
        ->count();
        
       $data = [ 
               'delivered' => $delivered,
               'dispatched' => $dispatched,
               'assigned' => $assigned
  ];

        return response()->json(['status' => '1', 'data' => $data]);
        
    }


  
  

}