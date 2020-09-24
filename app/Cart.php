<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{



    /**
     * Undocumented function
     *
     * 
     */
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
}
