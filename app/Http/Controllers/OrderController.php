<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $req)
    {
        $cart = Cart::where('user_id', $req->user()->user_id)->get();

        if ($cart->count() == 0) {
            return response()->json(['success' => false, 'message' => 'Cart kosong']);
        }

        $order = Order::create([
            'order_code' => 'ORD-' . time(),
            'user_id' => $req->user()->user_id,
            'total_price' => $cart->sum(fn($c) => $c->product->price * $c->qty),
            'status' => 'pending'
        ]);

        Cart::where('user_id', $req->user()->user_id)->delete();

        return ['success' => true, 'order' => $order];
    }

    public function history(Request $req)
    {
        return Order::with('transactions')
            ->where('user_id', $req->user()->user_id)
            ->get();
    }
}
