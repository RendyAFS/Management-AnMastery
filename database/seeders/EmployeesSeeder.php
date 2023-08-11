<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Agung', 'Mambar', 'Ipin', 'Empi', 'Rizal', 'Agus', 'Harno', 'RikoA', 'Mujib', 'Irwan',
            'Yoga', 'Adi', 'Viki', 'Arip', 'Ayet', 'Hegler', 'Mbarep', 'Dadang', 'RikoB'
        ];

        $tulungagungAddresses = [
            'Jl. Patimura No. 123',
            'Jl. Soekarno-Hatta No. 456',
            'Jl. Diponegoro No. 789',
            'Jl. Sudirman No. 101',
            'Jl. Ahmad Yani No. 202',
            'Jl. Gatot Subroto No. 303',
            'Jl. Airlangga No. 404',
            'Jl. Gajah Mada No. 505',
            'Jl. Pahlawan No. 606',
            'Jl. Kartini No. 707',
            'Jl. Sultan Agung No. 808',
            'Jl. WR Supratman No. 909',
            'Jl. Dr. Sutomo No. 1010',
            'Jl. KH Hasyim Ashari No. 1111',
            'Jl. Sudirman No. 1212',
            'Jl. Gatot Subroto No. 1313',
            'Jl. Ahmad Dahlan No. 1414',
            'Jl. Yos Sudarso No. 1515',
            'Jl. Diponegoro No. 1616'
        ];

        foreach ($names as $name) {
            $umur = mt_rand(20, 30);
            $alamat = $tulungagungAddresses[array_rand($tulungagungAddresses)]; // Pilih alamat secara acak dari array
            $nohp = '08' . mt_rand(100000000, 999999999);

            DB::table('employees')->insert([
                'nama_karyawan' => $name,
                'umur' => $umur,
                'alamat' => $alamat,
                'nohp' => $nohp,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
