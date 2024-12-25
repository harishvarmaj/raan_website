<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderItem;
use App\OrderAddress;
use App\OrderPayments;
use App\PaymentMethods;
use App\Referal;
use App\ProductVariantCombinations;
use App\Product;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


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
    public function razorpayApi($receipt, $amount, $currency, $payment_capture){
        // echo "ert";
        // exit();
            $keyId=getenv('Razar_keyId');
            $keySecret=getenv('Razar_keySecret');
            $ch = curl_init();
            $fields = array();
            $fields["receipt"] = $receipt;
            $fields["amount"] = $amount;
            $fields["currency"] = $currency;
            $fields["payment_capture"] = $payment_capture;
            curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $keyId.":".$keySecret );
            $headers = array();
            $headers[] = 'Accept: application/json';
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);

            if (empty($data) OR (curl_getinfo($ch, CURLINFO_HTTP_CODE != 200))) {
               $data = FALSE;
            } else {
                // echo $data;
                // exit();
                return json_decode($data, TRUE);
            }
            curl_close($ch);
    }
    public function razorpayApiVerifyPayment($receipt, $amount, $currency, $payment_capture){
        // echo "ert";
        // exit();
            $keyId=getenv('Razar_keyId');
            $keySecret=getenv('Razar_keySecret');
            $ch = curl_init();
            $fields = array();
            $fields["receipt"] = $receipt;
            $fields["amount"] = $amount;
            $fields["currency"] = $currency;
            $fields["payment_capture"] = $payment_capture;
            curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $keyId.":".$keySecret );
            $headers = array();
            $headers[] = 'Accept: application/json';
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);

            if (empty($data) OR (curl_getinfo($ch, CURLINFO_HTTP_CODE != 200))) {
               $data = FALSE;
            } else {
                // echo $data;
                // exit();
                return json_decode($data, TRUE);
            }
            curl_close($ch);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Order $order) {

             // dd(request()->all());
        DB::beginTransaction();
        //  echo "string";
        // exit();
        try {
            $user_id=auth()->user()->id;
            $refer_code=request()->offer_code;
            $referal='';
            request()->merge(['user_id' => $user_id]);
            $createOrder = $order->create(request()->all());
            $orderPayments = $order->create(request()->all());
            $createOrder->address()->create(request('address'));
            $payment_method_id = request()->payment_method_id;
            if(request('order_items')) {
            //     echo($payment_method_id);
            // exit();
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
                // $orderPayment->orderPayments()->saveMany($);
            }

            // $orderPayment = new OrderPayments();
            $amount = request()->total;
            $transaction_id = request()->transaction_id;
            $order_id = request()->id;

            // $paymentData = [
            //     'order_id' => $order_id,
            //     'payment_method_id' => $payment_method_id,
            //     'amount_paid' => $amount * 100,
            //     'transaction_id' => $transaction_id,
            // ];
           // foreach($paymentData as $paymentValues) {
          
            // $orderPayment = new OrderPayments($paymentData);

           // }
            
             // $createOrder->orderPayments()->saveMany($orderPayment);

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


  /** Razor pay order id creation START**/
        
        if($payment_method_id == '1')
        {

            $amount = request()->total;
            $keyId=getenv('Razar_keyId');
            $keySecret=getenv('Razar_keySecret');
            // echo($keyId);
            // echo($keySecret);
            // exit();
            // $api = new Api($keyId, $keySecret);
            //  $orderData = [
            //      'receipt'         => $order['id'],
            //      'amount'          => $amount * 100,
            //      'currency'        => 'INR',
            //      'payment_capture' => 1 // auto capture
            //  ];

             $razorpayOrder = $this->razorpayApi($order['id'], $amount * 100, 'INR', 1);
            // $razorpayOrder = $api->order->create($orderData);
            $razorpayOrderId = $razorpayOrder['id'];
            $createOrder->transaction_id=$razorpayOrderId;


        }
        /** Razor pay order id creation START**/
          
            return response()->json(['status' => '1', 'data' => $createOrder]);
        } catch (Exception $ex) {
            DB::rollback();
            return response()->json(['status' => '0', 'error' => $ex->getMessage()], 500);
        }
    }
    public function verify_payment(Request $request)
     {
         // echo "erer";
         // exit();
            $success = true;
            $error = "Payment Failed";
            if ($request->has('razorpay_payment_id'))
            {
               $keyId=getenv('Razar_keyId');
               $keySecret=getenv('Razar_keySecret');

               $razorpay_order_id=$request->razorpay_order_id;
                $razorpay_payment_id=$request->razorpay_payment_id;
                $razorpay_signature=$request->razorpay_signature;
                $generated_signature = hash_hmac('sha256', $razorpay_order_id . "|" . $razorpay_payment_id, $keySecret);
               // $generated_signature = hmac_sha256($razorpay_order_id . "|" . $razorpay_payment_id, $keySecret);

                if ($generated_signature != $razorpay_signature) {
                    $success = false;
                    
                  return response()->json([
                    'success' => false,
                    'result'  => 'Payment failure!'
               
                    // 'result'  => $e->getMessage(),
                     ]);
               
                }
                
        

               // $api = new Api($keyId, $keySecret); 

                // try
                // {

                         // $razorpay_order_id=$request->razorpay_order_id;
                         // $razorpay_payment_id=$request->razorpay_payment_id;
                         // $razorpay_signature=$request->razorpay_signature;
                    
                         // $attributes = array(
                         //     'razorpay_order_id' => $razorpay_order_id,
                         //     'razorpay_payment_id' => $razorpay_payment_id,
                         //     'razorpay_signature' => $razorpay_signature
                         //  );
    
                         // $api->utility->verifyPaymentSignature($attributes);
                //  }
                //  catch(SignatureVerificationError $e)
                // {
                //   $success = false;
                    
                //   return response()->json([
                //     'success' => false,
                //     'result'  => $e->getMessage(),
                //      ]);
                // }
            }
    
            if ($success === true)
            {

                DB::table('order_payments')
                ->where('transaction_id', $razorpay_order_id)
                ->update(['razorpay_payment_id'   => $razorpay_payment_id,
                    'razorpay_signature' => $razorpay_signature,
                    'payment_status' => '1']);

                // OrderPayments::where('transaction_id', $razorpay_order_id)->update([
                //     'razorpay_payment_id'   => $razorpay_payment_id,
                //     'razorpay_signature' => $razorpay_signature,
                //     'payment_status' => '1'
                // ]);
        
             
                return response()->json([
                    'success' => true,
                    'result'  => 'Payment successful!',
                     ]);
            }
            else
            {
                
                return response()->json([
                    'success' => false,
                    'result'  => 'Payment failure!',
                     ]);
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
