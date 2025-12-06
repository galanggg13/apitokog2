<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = ['title'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
