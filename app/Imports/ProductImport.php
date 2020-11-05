<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
             'img' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'price' => $row[3],
            'stock' => $row[4],
            'disabled_at' => ($row[5]),
            'created_at' => ($row[6]),
            'updated_at' => ($row[7])
        ]);
    }
}
