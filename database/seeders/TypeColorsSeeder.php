<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['jenis_warna' => '1 Warna'],
            ['jenis_warna' => '2 Warna'],
            ['jenis_warna' => '3 Warna'],
        ];

        foreach ($colors as $color) {
            DB::table('type_colors')->insert([
                'jenis_warna' => $color['jenis_warna'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
