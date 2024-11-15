<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'employee1',
                'sex' => 'male',
                'division' => 'IT Department'
            ],
            [
                'name' => 'employee2',
                'sex' => 'male',
                'division' => 'Backend Dev'
            ],
            [
                'name' => 'employee3',
                'sex' => 'female',
                'division' => 'Frontend Dev'
            ],
        ]);
    }
}
