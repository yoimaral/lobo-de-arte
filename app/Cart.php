<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    /**
     * Se crea la relacion polimorfica de cart y product 
     * de muchos a muchos con morphToMany y se pasa
     * el nombre de la relacion polimorfica que es productable
     *
     * @return void
     */
    public function products()
    {

        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
}
