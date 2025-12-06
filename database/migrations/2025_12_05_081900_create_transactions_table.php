<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id'); // PRIMARY KEY

            $table->unsignedBigInteger('order_id');
            $table->string('payment_method')->nullable();

            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
                'expired'
            ])->default('pending');

            $table->string('midtrans_status')->nullable();
            $table->string('midtrans_transaction_id')->nullable(); // Ganti ini!!
            $table->string('transaction_time')->nullable();

            $table->string('gross_amount')->nullable();
            $table->string('snap_token')->nullable();

            $table->string('proof_image')->nullable();

            $table->timestamps();

            // RELASI ORDER
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
