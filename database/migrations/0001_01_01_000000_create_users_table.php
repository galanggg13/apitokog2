<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // WAJIB: primary key bernama 'id' agar aman untuk foreign key
            
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->string('image')->nullable();
            $table->string('address')->nullable();

            // kalau mau, boleh hapus ini karena Sanctum sudah ganti cara token
            $table->string('api_token', 80)->nullable()->unique();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

