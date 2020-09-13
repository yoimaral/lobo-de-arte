<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    /**
     * Se crea la relacion de cart y product 
     * de muchos a muchos belongsToMany
     *
     * @return void
     */
    public function products()
    {

        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
