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
        'amount', 'payed_at', 'order_id'
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

    /**
     * Se le indica que un payment
     * pertenece a una sola orden
     *
     * @return void
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
