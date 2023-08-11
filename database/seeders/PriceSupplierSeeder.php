<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $prices = [
            ['harga_supplier' => '1300'],
            ['harga_supplier' => '1350'],
            ['harga_supplier' => '1500'],
            ['harga_supplier' => '1600'],
            ['harga_supplier' => '1700'],
            ['harga_supplier' => '1800'],
            ['harga_supplier' => '1900'],
        ];

        foreach ($prices as $price) {
            DB::table('price_suppliers')->insert([
                'harga_supplier' => $price['harga_supplier'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
