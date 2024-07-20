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

        Order::create($data);
        $cart->delete();

        return back()->with('success', 'Order placed successfully');
    }

    public function status($id, $status){
        $order = Order::find($id);
        $order->status =$status;
        $order->save();
        return back()->with('success', 'Order status updated successfully');
    }
}
