<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{

   use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
             'img' => $row[1],
            'name' => $row[2],
            'description' => $row[3],
            'price' => $row[4],
            'stock' => $row[5],
            'disabled_at' => $row[6],
            'created_at' => $row[7],
            'updated_at' => $row[8]
        ]);
    }

    public function rules(): array
    {
        return [

            'img' => 'required|',
            'name' => 'required|',
            'description' => 'required|',
            'price' => 'required|min 5000|numeric',
            'stock' => 'required|min 1|max 1|numeric',
            'disabled_at' => 'required|numeric',
            'created_at' => 'required|',
            'updated_at' => 'required|',

        ];
    }
}
