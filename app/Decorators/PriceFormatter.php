<?php

namespace App\Decorators;


class PriceFormatter implements PriceFormatterContract
{
    /**
     * Undocumented function
     *
     * @param float $price
     * @return string
     */
    public function format(float $price): string
    {
        return (string) $price;
    }
    
}
