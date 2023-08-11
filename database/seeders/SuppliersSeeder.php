<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            ['nama_supplier' => 'Sunar', 'alamat' => 'Jl. Patimura No.1, Moyoketen, Gedangsewu, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66231', 'types' => ['HGT', 'INT', 'Febri']],
            ['nama_supplier' => 'Yadi', 'alamat' => 'Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 'types' => ['Biasa']],
            ['nama_supplier' => 'Bibit', 'alamat' => 'WV9W+RXX, Unnamed Road, Prayan, Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 'types' => ['Lebar']],
            ['nama_supplier' => 'Santoso', 'alamat' => 'Jl. Yos Sudarso Gg. 1 No.14, Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 'types' => ['Biasa']],
            ['nama_supplier' => 'Mail', 'alamat' => 'Gg. 2 68-44, Botoran, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur 66213', 'types' => ['Biasa']],
            ['nama_supplier' => 'Yanti', 'alamat' => 'Jl. Dr. Sutomo Gang 1 25-27, Tertek, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur 66216', 'types' => ['Biasa']],
            ['nama_supplier' => 'Imam', 'alamat' => 'Jl. KH. Ilyas Habibulloh No.25, Palem, Serut, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66235', 'types' => ['Biasa']],
            ['nama_supplier' => 'Sirajudin', 'alamat' => 'Jl. Yos Sudarso Gg. 1 No.14, Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 'types' => ['TC']],
            ['nama_supplier' => 'Udin', 'alamat' => 'Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 'types' => ['TC']],
        ];

        foreach ($suppliers as $supplier) {
            $HGT = in_array('HGT', $supplier['types']) ? mt_rand(4, 10) : 0;
            $INT = in_array('INT', $supplier['types']) ? mt_rand(10, 18) : 0;
            $Febri = in_array('Febri', $supplier['types']) ? mt_rand(10, 16) : 0;
            $TC = in_array('TC', $supplier['types']) ? mt_rand(6, 14) : 0;
            $Biasa = in_array('Biasa', $supplier['types']) ? mt_rand(10, 14) : 0;
            $Lebar = in_array('Lebar', $supplier['types']) ? mt_rand(6, 10) : 0;
            $jumlah_kain = $HGT + $INT + $Febri + $TC + $Biasa + $Lebar;

            $supplierModel = DB::table('suppliers')->insertGetId([
                'nama_supplier' => $supplier['nama_supplier'],
                'alamat' => $supplier['alamat'],
                'HGT' => $HGT,
                'INT' => $INT,
                'Febri' => $Febri,
                'TC' => $TC,
                'Biasa' => $Biasa,
                'Lebar' => $Lebar,
                'jumlah_kain' => $jumlah_kain,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $typeFabricIds = [];
            foreach ($supplier['types'] as $type) {
                $typeFabric = DB::table('type_fabrics')->where('jenis_kain', $type)->first();
                if ($typeFabric) {
                    $typeFabricIds[] = $typeFabric->id;
                }
            }

            if (!empty($typeFabricIds)) {
                DB::table('supplier_type_fabric')->insert([
                    'supplier_id' => $supplierModel,
                    'type_fabric_id' => $typeFabricIds,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
};
