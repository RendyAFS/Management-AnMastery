<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Payment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::all();
        $payments = Payment::all();

        return view('admin.income', compact('incomes', 'payments'));
    }

    public function getData(Request $request)
    {
        $incomes = Income::all();

        if ($request->ajax()) {
            return datatables()->of($incomes)
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
        $incomes = new Income();
        $incomes->uang_kotor = $request->uang_kotor;
        $incomes->gaji_karyawan = $request->gaji_karyawan;

        // Hitung uang_bersih
        $incomes->uang_bersih = $incomes->uang_kotor - $incomes->gaji_karyawan;

        // Alert
        if ($incomes->save()) {
            Alert::success('Berhasil Menambahkan Pemasukkan');
        } else {
            Alert::error('Gagal Memperbarui', 'Terjadi kesalahan saat memperbarui karyawan.');
        }

        return redirect()->route('incomes.index');
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
