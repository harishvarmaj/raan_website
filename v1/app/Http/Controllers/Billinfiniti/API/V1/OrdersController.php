<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderItem;
use App\Referal;
use App\ProductVariantCombinations;
use App\Product;


class OrdersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order) {
        $orders = Order::with('orderItems.productCombinations.product.images', 'address')->where('user_id', auth()->user()->id)->get();
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
    public function store(Order $order) {
        DB::beginTransaction();
        try {
            $user_id=auth()->user()->id;
            $refer_code=request()->offer_code;
            $referal='';
             
            request()->merge(['user_id' => $user_id]);
            $createOrder = $order->create(request()->all());
            $createOrder->address()->create(request('address'));
            if(request('order_items')) {
                foreach(request('order_items') as $item) {
                     $productVariant = ProductVariantCombinations::find($item['product_variant_combination_id']);
                     $stock=$productVariant->quantity;
                     $orderQty=$item['quantity'];
                    
                     if($stock < $orderQty)
                     {
                           $product = Product::find($productVariant->product_id);
                           $productName=$product->name;
                           DB::rollback();
                           $productName=$productName.' is out of stock!';
                           return response()->json(['status' => '0', 'error' => $productName]);
                     }
                     
                     $productVariant->decrement('quantity', $item['quantity']);
    
                    $addItem[] = new OrderItem($item);
                }                
                $createOrder->orderItems()->saveMany($addItem);
            }
            DB::commit();
            
            $order_count = Order::where('user_id', '=',$user_id)->count();
            if($order_count==1)
              $referal=Referal::where('user_id_from', '=',$user_id)->update(['enable' => "1"]);
              
            if(strlen($refer_code) > 0)
            {
                $key_offer=substr($refer_code,0,3);
                if($key_offer=='REF')
                {
                  $referal=Referal::where('user_id_to', '=',$user_id)->where('code', '=',$refer_code)->update(['completed' => "1"]);
                }
                
            }
  
          
            return response()->json(['status' => '1', 'data' => $createOrder]);
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
      //  $order = Order::find($id)->with('orderItems.productCombinations.product.images', 'address')->where('user_id', auth()->user()->id)->get();
        $order = Order::with('orderItems.productCombinations.product.images', 'address')->find($id);

        if ($order){
            return response()->json(['status' => '1', 'data' => $order]);
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
                $updateOrder = $order->update(request()->only('cancelled_reason', 'cancelled_at','order_status'));
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
