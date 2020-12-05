<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::find($row['id']);
        return $product ? $this->updateProduct($product, $row) : $this->createProduct($row);
    }

    public function createProduct($row)
    {
        return new Product([
             'id' => $row[0],
             'img' => $row[1],
            'name' => $row[2],
            'description' => $row[3],
            'price' => $row[4],
            'stock' => $row[5],
            'disabled_at' => $row[6],
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @param array $row
     * @return void
     */
    public function updateProduct(Product $product, $row)
    {
        $product->update($row);
        return $product;
    }
}