<?php

namespace App\Charts;

use App\Models\Income;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Date;

class IncomesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $incomes = Income::all();
        $data = [];
        $tanggal = [];

        foreach ($incomes as $income) {
            $data[] = $income->uang_bersih;
            $tanggal[] = $income->created_at->format('d/m/Y'); // Mengubah format tanggal
        }

        return $this->chart->barChart()
            ->setTitle('Incomes AnMAstery')
            ->setSubtitle('Grafik Uang Bersih')
            ->addData('Uang Bersih', $data)
            ->setXAxis($tanggal);
    }
}
