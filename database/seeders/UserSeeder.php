<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
