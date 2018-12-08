<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Rasel Ahmed',
            'email' => 'rasel@ahmed.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);
        App\Profile::create([
            'user_id' => 1,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Lorem ipsum dolor sit amet',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
