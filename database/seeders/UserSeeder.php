<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);

        User::create([
            'username' => 'doctor',
            'password' => bcrypt('doctor'),
            'role_id' => 2
        ]);
    }
}
