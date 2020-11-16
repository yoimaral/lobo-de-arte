<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * ya que no se puede formatear des del controllador 
     * ya que un sistema real no funciona con pocos campos
     * si no con muchos. 
     * Por eso el Resource\Product se encarga de formatear
     * los datos por el controlador API
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'img' => $this->img,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
        ];
    }
}
