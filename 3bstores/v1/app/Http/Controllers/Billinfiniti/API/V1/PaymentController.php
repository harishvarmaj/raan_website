<?php


namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderItem;
use App\Referal;
use App\ProductVariantCombinations;
use App\OrderPayments;
use App\Product;
use Razorpay\Api\Api;

class PaymentController extends Controller
{

    public function create(Request $request)
     {
        $keyId=getenv('Razar_keyId');
        $keySecret=getenv('Razar_keySecret');
        $api = new Api($keyId, $keySecret);
        $orderData = [
             'receipt'         => 3456,
             'amount'          => 1 * 100, // 2000 rupees in paise
             'currency'        => 'INR',
             'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];
       
        return response()->json([
            'success' => true,
            'result'  => $razorpayOrderId,
        ]);
          
     }
}
