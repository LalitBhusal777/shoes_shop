<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
        ]);

        $cart = Cart::find($request->cart_id);
        if (!$cart) {
            return back()->with('error', 'Cart not found');
        }

        $data = [
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
            'price' => $cart->product->price,
            'status' => 'Pending',
            'order_date' => date('Y-m-d'),
        ];

        $order = Order::create($data);

        try {
            $order = Order::find($order->id);
            $product_code = 'EPAYTEST';
            $amount = $order->price;
            $tax_amount = 0;
            $total_amount = $amount + $tax_amount;
            $success_url = route('esewasuccess');
            $failure_url = route('esewafail');
            $transaction_uuid = $order->id . '-' . time();
            $signed_field_names = 'total_amount,transaction_uuid,product_code';
            $secret_key = '8gBm/:&EnhH.1/q';

            $data = "total_amount={$total_amount},transaction_uuid={$transaction_uuid},product_code={$product_code}";
            $signature = base64_encode(hash_hmac('sha256', $data, $secret_key, true));

            return response()->json([
                'product_code' => $product_code,
                'amount' => $amount,
                'tax_amount' => $tax_amount,
                'total_amount' => $total_amount,
                'success_url' => $success_url,
                'failure_url' => $failure_url,
                'transaction_uuid' => $transaction_uuid,
                'signed_field_names' => $signed_field_names,
                'signature' => $signature,
            ])->withHeaders([
                'Content-Type' => 'text/html'
            ])->setStatusCode(200)->setContent(
                '<html><body>' .
                '<form id="esewaForm" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">' .
                '<input type="hidden" name="amount" value="' . $amount . '">' .
                '<input type="hidden" name="tax_amount" value="' . $tax_amount . '">' .
                '<input type="hidden" name="total_amount" value="' . $total_amount . '">' .
                '<input type="hidden" name="transaction_uuid" value="' . $transaction_uuid . '">' .
                '<input type="hidden" name="product_code" value="' . $product_code . '">' .
                '<input type="hidden" name="product_service_charge" value="0">' .
                '<input type="hidden" name="product_delivery_charge" value="0">' .
                '<input type="hidden" name="success_url" value="' . $success_url . '">' .
                '<input type="hidden" name="failure_url" value="' . $failure_url . '">' .
                '<input type="hidden" name="signed_field_names" value="' . $signed_field_names . '">' .
                '<input type="hidden" name="signature" value="' . $signature . '">' .
                '</form>' .
                '<script>document.getElementById("esewaForm").submit();</script>' .
                '</body></html>'
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        return back()->with('success', 'Order status updated successfully');
    }
}
?>
