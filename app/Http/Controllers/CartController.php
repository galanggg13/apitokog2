<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $req)
    {
        return Cart::with('product')->where('user_id', $req->user()->user_id)->get();
    }

    public function add(Request $req)
    {
        $req->validate([
            'product_id' => 'required',
            'qty' => 'required|integer|min:1'
        ]);

        $cart = Cart::updateOrCreate(
            [
                'user_id' => $req->user()->user_id,
                'product_id' => $req->product_id
            ],
            ['qty' => $req->qty]
        );

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function update(Request $req)
    {
        Cart::where('id', $req->id)->update(['qty' => $req->qty]);

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        Cart::find($id)->delete();
        return response()->json(['success' => true]);
    }
}
