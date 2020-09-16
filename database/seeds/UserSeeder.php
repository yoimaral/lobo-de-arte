<?php

use App\User;
use App\Order;
use App\Payment;

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
        $users->name = 'Juango';
        $users->email = 'juango@gmail.com';
        $users->is_admin = false;
        $users->email_verified_at = now();
        $users->password = bcrypt('12345678');
        $users->save();

        $users = factory(App\User::class, 10)
            ->create()
            ->each(function ($user) {
                $image = factory(Image::class)
                    ->states('user')
                    ->make();

                $user->image()
                    ->user($image);
            });

        $orders = factory(Order::class, 10)
            ->make()
            ->each(function ($order) use ($users) {

                $order->customer_id = $users->random()->id;
                $order->save();

                $payment = factory(Payment::class)->make();
                $order->payment()->save($payment);
            });
    }
}
