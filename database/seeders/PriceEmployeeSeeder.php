<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $prices = [
            ['harga_karyawan' => '250'],
            ['harga_karyawan' => '300'],
            ['harga_karyawan' => '350'],
            ['harga_karyawan' => '370'],
            ['harga_karyawan' => '525'],
            ['harga_karyawan' => '555'],
        ];

        foreach ($prices as $price) {
            DB::table('price_employees')->insert([
                'harga_karyawan' => $price['harga_karyawan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
