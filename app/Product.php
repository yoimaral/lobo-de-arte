<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img', 'description', 'price', 'disabled_at'
    ];

    public function scopeProducts($query, $products)
    {
        if ($products)

            return $query->where('name', 'LIKE', "%$products%");
    }
}
