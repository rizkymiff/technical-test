<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        $credentials = [
            [
                'name'              => 'Achmad Miftahul Rizqi',
                'username'          => 'administrator',
                'email'             => 'tizqy.miftaqul77@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('1234567890'),
                'role'              => 'admin',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Rizky Miftaqul',
                'username'          => 'user',
                'email'             => 'rizky.dev28@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('1234567890'),
                'role'              => 'user',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
        ];

        User::insert($credentials);
    }
}
