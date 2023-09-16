<?php

namespace App\Http\Controllers;

use App\Charts\IncomesDashboardChart;
use App\Charts\JumlahKainChart;
use App\Models\Employee;
use App\Models\PictureFabric;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(JumlahKainChart $chartkain, IncomesDashboardChart $chartincome)
    {

        $pageTitle = 'Dashboard';
        $pics = PictureFabric::all();
        $employees = Employee::all();
        return view('admin.dashboard',
        compact('pageTitle', 'pics', 'employees'),
        [
            'chartkain' => $chartkain->build(),
            'chartincome' => $chartincome->build()
        ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
