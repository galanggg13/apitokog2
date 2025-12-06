<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_status',
        'midtrans_status',
        'transaction_time',
        'transaction_id',
        'gross_amount',
        'snap_token',
        'proof_image',
    ];

    // RELASI KE TABEL ORDERS
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
