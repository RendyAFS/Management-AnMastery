<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fabric;
use App\Models\Payment;
use App\Models\PictureFabric;
use App\Models\PriceEmployee;
use App\Models\Supplier;
use App\Models\TypeColor;
use App\Models\TypeFabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fabrics = Fabric::onlyTrashed()->orderBy('suppliers_id', 'desc')->get();
        $employees = Employee::all();
        $gajis = PriceEmployee::all();
        $payments = Payment::all();
        return view('admin.gaji',
        compact('fabrics','gajis','payments', 'employees'));
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

        $payment = new Payment;
        $payment -> nama = $request->nama;
        $payment -> deskripsi = $request->deskripsi;
        $payment -> total_gaji = $request->total_gaji;

        // Alert
        if ($payment->save()) {
            Alert::success('Berhasil Menambahkan');
        } else {
            Alert::error('Gagal Memperbarui', 'Terjadi kesalahan saat memperbarui karyawan.');
        }


        return redirect()->route('gajis.index');
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
    public function edit(int $id)
    {
        $gaji = PriceEmployee::find($id);
        return view('admin.actions.selesai', compact('gaji'));
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
    public function deleteall()
    {
        DB::table('payments')->delete();
        return redirect()->route('gajis.index');
    }

}
