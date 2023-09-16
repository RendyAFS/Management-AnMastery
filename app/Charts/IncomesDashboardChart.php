<?php

namespace App\Charts;

use App\Models\Income;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class IncomesDashboardChart
{
    protected $chartincome;

    public function __construct(LarapexChart $chartincome)
    {
        $this->chartincome = $chartincome;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $incomes = Income::all();
        $data = [];
        $tanggal = [];

        foreach ($incomes as $income) {
            $data[] = $income->uang_bersih;
            $tanggal[] = $income->created_at->format('d/m/Y'); // Mengubah format tanggal
        }
        
        return $this->chartincome->lineChart()
            ->setTitle('Grafik Incomes.')
            ->addData('Uang Bersih',$data)
            ->setXAxis($tanggal);
    }
}
