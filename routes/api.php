<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ChatController;

// ========== AUTH ==========
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // USER
    Route::get('/profile', [AuthController::class, 'profile']);

    // CATEGORY
    Route::get('/categories', [CategoryController::class, 'index']);

    // PRODUCTS
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);

    // CART
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/cart/update', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'delete']);

    // FAVORITE
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle']);

    // ORDER
    Route::post('/order/create', [OrderController::class, 'create']);
    Route::get('/order/history', [OrderController::class, 'history']);

    // TRANSACTION
    Route::post('/transaction/create', [TransactionController::class, 'create']);
    Route::post('/transaction/confirm', [TransactionController::class, 'confirm']);

    // NOTIFICATION
    Route::get('/notifications', [NotificationController::class, 'index']);

    // CHAT
    Route::get('/chats', [ChatController::class, 'index']);
    Route::post('/chat/send', [ChatController::class, 'send']);
});
