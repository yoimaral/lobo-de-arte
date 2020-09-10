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
        'name', 'img', 'description', 'price', 'stock', 'disabled_at'
    ];

    /**
     * Para asignar los campostipo fella en caso 
     * de querer realizar asignacones masivas
     *
     * @var array
     */
    protected $dates = [
        'disabled_at'
    ];

    /**
     * Esta funcion me realiza 
     * laconsulta de busqueda en labase dedatos
     * 
     */
    public function scopeProducts($query, $products)
    {
        if ($products)

            return $query->where('name', 'LIKE', "%$products%");
    }
}
