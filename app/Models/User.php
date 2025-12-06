<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'address',
    ];

    // Kolom yang disembunyikan saat response JSON
    protected $hidden = [
        'password',
        'remember_token',
        'api_token', // kalau masih dipakai
    ];

    // Type casting biar Laravel pintar baca tipe data
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
