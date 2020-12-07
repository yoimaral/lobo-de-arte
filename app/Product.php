<?php

namespace App;

use App\Decorators\CurrencyDecorator;
use App\Decorators\PriceFormatter;
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

    /**
     * Se crea la relacion de carts y product en los modelos
     * de muchos a muchos belongsToMany
     *
     * @return void
     */
    public function carts()
    {

        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }

    /**
     * Se crea la relacion de order y product 
     * de muchos a muchos belongsToMany
     *
     * @return void
     */
    public function orders()
    {

        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }

    public function images()
    {

        return $this->morphMany(Image::class, 'imageable');
    }

    public function getTotalAttribute()
    {

        return $this->pivot->quantity * $this->price;
    }

        public function getFormattedPrice(): string
    {
        $formatter = new PriceFormatter();

    switch(config('app.currency')){
        case 'COP': 
        $formatter = new CurrencyDecorator($formatter);
    }


/*         $currency = config('app.currency');
        $decoratorClassName = "Currency{$currency}Decorator"; */
/*         $formatter = 
        new 
        $decoratorClassName
        ($formatter); */

        return $formatter->format($this->price);
    }
}
