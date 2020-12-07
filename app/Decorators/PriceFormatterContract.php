<?php

namespace App\Decorators;


interface PriceFormatterContract
{
public function format(float $price): string;
}

