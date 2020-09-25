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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getTotalAttribute()
    {

        return $this->pivot->pluck('total')->sum();
    }
}
