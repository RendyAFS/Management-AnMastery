<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fabric;
use App\Models\Payment;
use App\Models\PriceEmployee;
use Illuminate\Http\Request;

class KaryawanGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Gaji';
        $fabrics = Fabric::onlyTrashed()->orderBy('suppliers_id', 'desc')->get();
        $employees = Employee::all();
        $gajis = PriceEmployee::all();
        $payments = Payment::all();
        return view('user.karyawangaji' ,
        compact(
            'pageTitle',
            'employees',
            'gajis',
            'fabrics',
            'payments',
        ));
    }
    public function getData(Request $request)
    {
        $gaji = Payment::all();

        if ($request->ajax()) {
            return datatables()->of($gaji)
                ->addIndexColumn()
                ->toJson();
        }
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
