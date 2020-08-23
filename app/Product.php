<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img', 'description', 'price', 'disabled_at'
    ];

    /**
     * Que me trae y que me devuelve
     * 
     * 
     * 
     */
    public function scopeProducts($query, $products)
    {
        if ($products)

            return $query->where('name', 'LIKE', "%$products%");
    }
}
