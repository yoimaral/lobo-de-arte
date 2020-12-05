<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromQuery, ShouldQueue, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Product::query();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
           'id',
           'img',
           'name',
           'description',
           'price',
           'stock',
           'disabled_at',

        ];
    }
}
