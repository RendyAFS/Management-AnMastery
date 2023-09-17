<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fabric;
use App\Models\PictureFabric;
use App\Models\Supplier;
use App\Models\TypeColor;
use App\Models\TypeFabric;
use Illuminate\Http\Request;

class KaryawanOnprosesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'OnProses';
        $suppliers = Supplier::orderBy('nama_supplier', 'asc')->get(); // Mengambil semua data supplier
        $employees = Employee::orderBy('nama_karyawan', 'asc')->get(); // Mengambil semua data karyawan
        $typefabrics = TypeFabric::all(); // Mengambil semua data jenis kain
        $typecolors = TypeColor::all(); // Mengambil semua data jenis warna
        $picturefabrics = PictureFabric::orderBy('gambar_kain', 'asc')->get(); // Mengambil semua data gambar kain
        $fabrics = Fabric::all();
        return view('user.karyawanonproses' ,
         compact(
            'pageTitle',
            'suppliers',
            'employees',
            'typefabrics',
            'typecolors',
            'picturefabrics',
            'fabrics',
        ));
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
