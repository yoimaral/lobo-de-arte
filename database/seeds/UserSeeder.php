<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Yoimar Lozano';
        $user->email = 'yoimar@gmail.com';
        $user->is_admin = true;
        $user->email_verified_at = now();
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User;
        $user->name = 'Juango';
        $user->email = 'juango@gmail.com';
        $user->is_admin = false;
        $user->email_verified_at = now();
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
