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
                'level' => 'admin',
                'name' => 'Administrator',
                'email' => 'a@a',
                'password' => bcrypt('qawsedrf'),
            ],
            [
                'level' => 'user',
                'name' => 'Rendy',
                'email' => 'r@r',
                'password' => bcrypt('qawsedrf'),
            ],
        ]);
    }
}
