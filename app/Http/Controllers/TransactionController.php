<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Request $req)
    {
        $req->validate([
            'order_id' => 'required',
            'payment_method' => 'required'
        ]);

        $order = Order::findOrFail($req->order_id);

        $trx = Transaction::create([
            'order_id' => $order->order_id,
            'payment_method' => $req->payment_method,
            'gross_amount' => $order->total_price,
            'payment_status' => 'pending',
        ]);

        return ['success' => true, 'transaction' => $trx];
    }

    public function confirm(Request $req)
    {
        $trx = Transaction::findOrFail($req->transaction_id);

        $trx->update([
            'payment_status' => 'paid',
            'midtrans_status' => 'settlement'
        ]);

        return ['success' => true];
    }
}
