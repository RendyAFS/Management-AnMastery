<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fabric;
use App\Models\PictureFabric;
use App\Models\PriceEmployee;
use App\Models\Supplier;
use App\Models\TypeColor;
use App\Models\TypeFabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OnprosesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        // Ambil data fabric berdasarkan ID
        $fabric = Fabric::find($id);

        // Ambil data suppliers, employees, typefabrics, typecolors, dan picturefabrics
        $suppliers = Supplier::all();
        $employees = Employee::all();
        $typefabrics = TypeFabric::all();
        $typecolors = TypeColor::all();
        $picturefabrics = PictureFabric::all();

         // Temukan supplier yang sesuai dengan fabric
        $selectedSupplierId = $fabric->suppliers_id;
        $selectedEmployeeId = $fabric->employees_id;
        $selectedTypeFabricId = $fabric->type_fabrics_id;
        $selectedTypeColorId = $fabric->type_colors_id;
        $selectedPictureFabricId = $fabric->picture_fabrics_id;
        return view('admin.actions.editproses',
        compact('fabric', 'suppliers', 'employees','typefabrics', 'typecolors', 'picturefabrics',
        'selectedSupplierId',
        'selectedEmployeeId',
        'selectedTypeFabricId',
        'selectedTypeColorId',
        'selectedPictureFabricId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        // Ambil data fabric berdasarkan ID
        $fabric = Fabric::findOrFail($id);

        // Update data fabric
        $fabric->suppliers_id = $request->nama_supplier;
        $fabric->employees_id = $request->nama_karyawan;
        $fabric->type_fabrics_id = $request->type_fabric;
        $fabric->type_colors_id = $request->type_color;
        $fabric->picture_fabrics_id = $request->picture_fabric;


        // Alert
        if ($fabric->save()) {
            Alert::success('Berhasil Memperbarui');
        } else {
            Alert::error('Gagal Memperbarui', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('onproses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fabric = Fabric::find($id);

        Alert::success('Proses Selesesai', 'Proses Pengerjaan Telah Selesai.');

        $fabric->delete();
        return redirect()->route('onproses.index');
    }

    public function selesai(){
        $fabrics = Fabric::onlyTrashed()->get();

        return view('admin.actions.selesaiproses', compact('fabrics'));
    }

    public function clearselesai()
    {
        Fabric::onlyTrashed()->forceDelete();

        return redirect()->route('selesai');
    }

    public function restore($id)
    {
        Fabric::withTrashed()->find($id)->restore();
        return redirect()->route('selesai');
    }

    public function selesaisemua()
    {
        Fabric::query()->delete(); // Menggunakan soft delete
        Alert::success('Proses Selesai', 'Proses Pengerjaan Telah Selesai.');
        return redirect()->route('onproses.index');
    }


    public function restoreall()
    {
        Fabric::withTrashed()->restore();
        Alert::success('Proses Selesai Dikembalikan', 'Proses Pengerjaan Dikembalikan.');
        return redirect()->route('selesai');
    }

}
