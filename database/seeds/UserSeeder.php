<?php

use App\User;
use App\Order;
use App\Payment;
use App\Image;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function run()
    {
        $users = new User;
        $users->name = 'Yoimar Lozano';
        $users->email = 'yoimar@gmail.com';
        $users->is_admin = true;
        $users->email_verified_at = now();
        $users->password = bcrypt('12345678');
        $users->save();

        $users = new User;
        $users->name = 'yiyi';
        $users->email = 'yiyis@gmail.com';
        $users->is_admin = false;
        $users->email_verified_at = now();
        $users->password = bcrypt('12345678');
        $users->save();

        /* 
        $users = factory(App\User::class, 10)
            ->create()
            ->each(function ($user) {
                $image = factory(Image::class)
                    ->states('user')
                    ->make();

                $user->image()
                    ->save($image);
            });

        $orders = factory(Order::class, 10)
            ->make()
            ->each(function ($order) use ($users) {

                $order->customer_id = $users->random()->id;
                $order->save();

                $payment = factory(Payment::class)->make();
                $order->payment()->save($payment);
            });

        $carts = factory(App\Cart::class, 10)->create();

        $products = factory(App\Product::class, 50)->create()
            ->each(function ($product) use ($orders, $carts) {
                $order = $orders->random();

                $order->products()->attach([
                    $product->id => ['quantity' => mt_rand(1, 3)],
                ]);
                $cart = $carts->random();

                $cart->products()->attach([
                    $product->id => ['quantity' => mt_rand(1, 5)],

                ]);
                $images = factory(Image::class, mt_rand(2, 4))->make();
                $product->images()->saveMany($images);
            }); */
    }
}
