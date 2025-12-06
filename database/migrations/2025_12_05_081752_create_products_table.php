<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // primary key

            $table->string('name');
            $table->text('description')->nullable();

            $table->integer('price');
            $table->integer('stock')->default(0);

            $table->string('colour')->nullable();   // ada warna
            $table->decimal('rating', 3, 2)->default(0); // ⭐ rating (0.00 - 5.00)
            $table->string('image')->nullable();

            // Relasi kategori
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
