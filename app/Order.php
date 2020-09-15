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

    /**
     * Se crea la relacion polimorfica de order y product 
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
