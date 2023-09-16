<?php

namespace App\Charts;

use App\Models\Supplier;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahKainChart
{
    protected $chartkain;

    public function __construct(LarapexChart $chartkain)
    {
        $this->chartkain = $chartkain;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $suppliers = Supplier::all();

        $data = [];
        $namasupplier = [];

        foreach ($suppliers as $supplier) {
            $jumlahKain = (int)$supplier->jumlah_kain; // Mengonversi nilai ke integer jika belum
            $data[] = $jumlahKain;
            $namasupplier[] = $supplier->nama_supplier;
        }

        return $this->chartkain->pieChart()
            ->setTitle('Jumlah Kain.')
            ->addData($data)
            ->setLabels($namasupplier);
    }
}
