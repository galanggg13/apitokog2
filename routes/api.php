<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import semua Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TransactionController;


// ============================
// PUBLIC ROUTES
// ============================

// Cek server hidup
Route::get('/ping', function () {
    return response()->json(['alive' => true]);
});

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);


// ============================
// PROTECTED ROUTES (pakai Sanctum Token)
// ============================

Route::middleware('auth:sanctum')->group(function () {

    // USER PROFILE
    Route::get('/user', function (Request $req) {
        return $req->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);


    // ============================
    // PRODUCTS
    // ============================
    Route::get('/products',           [ProductController::class, 'index']);
    Route::get('/products/{id}',      [ProductController::class, 'show']);
    Route::post('/products',          [ProductController::class, 'store']);
    Route::put('/products/{id}',      [ProductController::class, 'update']);
    Route::delete('/products/{id}',   [ProductController::class, 'destroy']);


    // ============================
    // CATEGORIES
    // ============================
    Route::get('/categories',        [CategoryController::class, 'index']);
    Route::post('/categories',       [CategoryController::class, 'store']);
    Route::put('/categories/{id}',   [CategoryController::class, 'update']);
    Route::delete('/categories/{id}',[CategoryController::class, 'destroy']);


    // ============================
    // CART
    // ============================
    Route::get('/cart',                 [CartController::class, 'index']);
    Route::post('/cart/add',            [CartController::class, 'add']);
    Route::post('/cart/update',         [CartController::class, 'update']);
    Route::post('/cart/remove',         [CartController::class, 'remove']);


    // ============================
    // FAVORITE
    // ============================
    Route::get('/favorites',            [FavoriteController::class, 'index']);
    Route::post('/favorites/toggle',    [FavoriteController::class, 'toggle']);


    // ============================
    // ORDER
    // ============================
    Route::post('/order/create',        [OrderController::class, 'create']);
    Route::get('/orders',               [OrderController::class, 'index']);
    Route::get('/orders/{id}',          [OrderController::class, 'show']);


    // ============================
    // TRANSACTIONS (Midtrans / Manual)
    // ============================
    Route::post('/transaction/create',  [TransactionController::class, 'create']);
    Route::post('/transaction/confirm', [TransactionController::class, 'confirm']);
    Route::get('/transactions',         [TransactionController::class, 'index']);


    // ============================
    // NOTIFICATIONS
    // ============================
    Route::get('/notifications',        [NotificationController::class, 'index']);


    // ============================
    // CHAT
    // ============================
    Route::get('/chat/{receiver_id}',   [ChatController::class, 'fetch']);
    Route::post('/chat/send',           [ChatController::class, 'send']);
});
