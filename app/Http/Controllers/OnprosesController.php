<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fabric;
use App\Models\PictureFabric;
use App\Models\Supplier;
use App\Models\TypeColor;
use App\Models\TypeFabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OnprosesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('nama_supplier', 'asc')->get(); // Mengambil semua data supplier
        $employees = Employee::orderBy('nama_karyawan', 'asc')->get(); // Mengambil semua data karyawan
        $typefabrics = TypeFabric::all(); // Mengambil semua data jenis kain
        $typecolors = TypeColor::all(); // Mengambil semua data jenis warna
        $picturefabrics = PictureFabric::orderBy('gambar_kain', 'asc')->get(); // Mengambil semua data gambar kain
        $fabrics = Fabric::all();
        return view('admin.onproses',
        compact('suppliers', 'employees', 'typefabrics', 'typecolors', 'picturefabrics', 'fabrics'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function create()
     {

     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tentukan pesan kesalahan kustom
        $messages = [
            'required' => ':attribute harus diisi.',
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'nama_karyawan' => 'required',
            'type_fabric' => 'required',
            'type_color' => 'required',
            'picture_fabric' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Validasi berhasil, lanjutkan untuk menyimpan data
        $fabric = new Fabric;
        $fabric->suppliers_id = $request->nama_supplier;
        $fabric->employees_id = $request->nama_karyawan;
        $fabric->type_fabrics_id = $request->type_fabric;
        $fabric->type_colors_id = $request->type_color;
        $fabric->picture_fabrics_id = $request->picture_fabric;

        // Alert
        if ($fabric->save()) {
            Alert::success('Berhasil Menambahkan');
        } else {
            Alert::error('Gagal Memperbarui', 'Terjadi kesalahan saat memperbarui karyawan.');
        }


        return redirect()->route('onproses.index');
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
