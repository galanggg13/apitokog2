<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $req)
    {
        return Favorite::with('product')->where('user_id', $req->user()->user_id)->get();
    }

    public function toggle(Request $req)
    {
        $existing = Favorite::where('user_id', $req->user()->user_id)
            ->where('product_id', $req->product_id)
            ->first();

        if ($existing) {
            $existing->delete();
            return ['favorite' => false];
        }

        Favorite::create([
            'user_id' => $req->user()->user_id,
            'product_id' => $req->product_id
        ]);

        return ['favorite' => true];
    }
}
