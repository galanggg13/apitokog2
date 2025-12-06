<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    // Kolom yang boleh diisi
    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_status',
        'midtrans_status',
        'midtrans_transaction_id',
        'transaction_time',
        'gross_amount',
        'snap_token',
        'proof_image',
    ];

    /**
     * Relasi ke Order
     * Satu transaksi hanya punya satu order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
