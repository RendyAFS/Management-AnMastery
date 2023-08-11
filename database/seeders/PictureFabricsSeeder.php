<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureFabricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $gambarKain = [
            'Robot', 'Love', 'Kipas', 'Kelinci', 'Beruang', 'Angry Birds', 'Bulan Bintang', 'Flamboyan',
            'Kenangan', 'Bawang', 'Cempaka', 'Raflesia', 'Lotus', 'Adenium', 'Rosela', 'Seruni', 'Anggrek',
            'Semanggi', 'Teratai', 'Nusa Indah', 'Matahari', 'Bougenvil', 'Aster', 'Jasmin', 'Dahlia',
            'Melati', 'Mawar', 'Sepatu', 'Kuncup', 'Sakura', 'Mahkota', 'Kamboja', 'Lavender'
        ];

        foreach ($gambarKain as $gambar) {
            DB::table('picture_fabrics')->insert([
                'gambar_kain' => $gambar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
