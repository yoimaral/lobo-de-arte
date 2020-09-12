<?php

namespace App;

use App\Payment;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'customer_id'
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

    /**
     * Se crea la relacion de order y users
     * indicando que order es la llave foranea de users
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
