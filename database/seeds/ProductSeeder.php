<?php

use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $id = $i + 1;
            $product->img = "img/products/{$id}.jpg";
            $product->name = $faker->sentence(1, true);
            $product->description = $faker->text(80);
            $product->price = $faker->numberBetween(1, 50) * 100;
            $product->stock = $faker->numberBetween(1);
            $product->save();
        }
    }
}
