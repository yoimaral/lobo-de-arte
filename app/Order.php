<?php

namespace App;

use App\Payment;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * Se indica que una orden 
     * tiene un solo pago
     *
     * @return void
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
