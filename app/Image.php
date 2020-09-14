<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'path'
    ];

    /**
     * La funcion morphTo determina si es un 
     * producto o un usuario el que agregue la foto
     *
     * @return void
     */
    public function imageable()
    {

        return $this->morphTo();
    }
}
