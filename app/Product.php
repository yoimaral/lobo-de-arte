<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'img', 'name', 'description', 'price', 'state_enabled_at'
    ];
}
