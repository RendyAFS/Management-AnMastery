<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeFabricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisKain = [
            ['jenis_kain' => 'HGT'],
            ['jenis_kain' => 'INT'],
            ['jenis_kain' => 'Febri'],
            ['jenis_kain' => 'TC'],
            ['jenis_kain' => 'Biasa'],
            ['jenis_kain' => 'Lebar'],
        ];

        DB::table('type_fabrics')->insert($jenisKain);
    }
}
