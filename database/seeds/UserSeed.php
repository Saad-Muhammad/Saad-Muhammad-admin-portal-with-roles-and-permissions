<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'avatar' => '1631793197.png',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Sam',
            'email' => 'user@user.com',
            'avatar' => '1631793197.png',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('user');
    }
}
