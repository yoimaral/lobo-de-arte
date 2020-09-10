<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'payed_at'
    ];

    /**
     * Para asignar los campostipo fella en caso 
     * de querer realizar asignacones masivas
     *
     * @var array
     */
    protected $dates = [
        'payed_at',
    ];
}
