<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');

            // RELASI KE TABEL ORDERS
            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();

            // METODE PEMBAYARAN
            $table->string('payment_method')->nullable();

            // STATUS PEMBAYARAN
            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
                'expired'
            ])->default('pending');

            // STATUS & DATA DARI MIDTRANS
            $table->string('midtrans_status')->nullable();
            $table->string('transaction_time')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('gross_amount')->nullable();
            $table->string('snap_token')->nullable();

            // BUKTI PEMBAYARAN
            $table->string('proof_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
