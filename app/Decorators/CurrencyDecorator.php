<?php

namespace App\Decorators;

use App\Constant\TipeCurrencies;

class CurrencyDecorator implements PriceFormatterContract
{
    private $formatter;

    public function __construct(PriceFormatterContract $formatter)
    {

        $this->formatter = $formatter;

    }

    /**
     * Sobre escribir el metodo
     *
     * @param float $value
     * @return string
     */
    public function format(float $value): string
    {
        $value = $this->formatter->format($value);

        return "{$value} COP";
    }
}
