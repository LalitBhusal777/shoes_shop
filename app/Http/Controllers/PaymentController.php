<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentverify(Request $request)
    {
        $data = $request->input('data');
        $decoded_data = json_decode(base64_decode($data), true);

        if (!$decoded_data) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        $transaction_code = $decoded_data['transaction_code'];
        $transaction_uuid = $decoded_data['transaction_uuid'];
        $total_amount = $decoded_data['total_amount'];
        $status = $decoded_data['status'];
        $product_code = $decoded_data['product_code'];
        $signed_field_names = $decoded_data['signed_field_names'];
        $signature = $decoded_data['signature'];

        $secret_key = '8gBm/:&EnhH.1/q';
        $data_string = "transaction_code={$transaction_code},status={$status},total_amount={$total_amount},transaction_uuid={$transaction_uuid},product_code={$product_code},signed_field_names={$signed_field_names}";
        $hash = base64_encode(hash_hmac('sha256', $data_string, $secret_key, true));

        

      
        list($extracted_id, $extracted_timestamp) = explode('-', $transaction_uuid);

        $order = Order::where('id', $extracted_id)->first();

        if ($status !== 'COMPLETE') {
            return redirect()->route('esewa.fail')->with('error', 'Payment not completed');
        }

        $order = Order::find($extracted_id);
        $order->status = 'paid';
        $order->save();

        $paymentdata = [
            'order_id' => $extracted_id,
            'transaction_id' => $transaction_code,
            'amount' => $total_amount,
            'payment_method' => 'esewa',
            'payment_status' => $status,
            // 'payment_response' => json_encode($decoded_data) ,
        ];

        Payment::create($paymentdata);
        return redirect()->route('mycart')->with('success', 'Payment successful');
    }



    public function paymentfail(Request $request)
    {
        echo ('fail vhayo vai ');
    }
}
