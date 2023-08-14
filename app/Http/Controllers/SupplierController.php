<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class SupplierController extends Controller
{

    public function index()
    {

        // confirmDelete();

         return view('admin.supplier');
    }

    public function getData(Request $request)
    {
        $suppliers = Supplier::all();

        if ($request->ajax()) {
            return datatables()->of($suppliers)
                ->addIndexColumn()
                ->addColumn('actions', function($supplier) {
                    return view('admin.actions.actionsupplier', compact('supplier'));
                })
                ->toJson();
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.action.createsupplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Mendefinisikan pesan kesalahan untuk validasi input
        $messages = [
            'required' => ':attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',

        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'HGT' => 'numeric',
            'INT' => 'numeric',
            'Febri' => 'numeric',
            'TC' => 'numeric',
            'Biasa' => 'numeric',
            'Lebar' => 'numeric',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->HGT = $request->HGT;
        $supplier->INT = $request->INT;
        $supplier->Febri = $request->Febri;
        $supplier->TC = $request->TC;
        $supplier->Biasa = $request->Biasa;
        $supplier->Lebar = $request->Lebar;

        // Melakukan perhitungan jumlah kain
        $jumlah_kain = $request->HGT + $request->INT + $request->Febri + $request->TC + $request->Biasa + $request->Lebar;
        $supplier->jumlah_kain = $jumlah_kain;

        $supplier->save();
        return redirect()->route('suppliers.index');

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
        $supplier = Supplier::find($id);
        return view ('admin.actions.editsupplier', compact('supplier'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string',
            'alamat' => 'required|string',
            'HGT' => 'required|numeric',
            'INT' => 'required|numeric',
            'Febri' => 'required|numeric',
            'TC' => 'required|numeric',
            'Biasa' => 'required|numeric',
            'Lebar' => 'required|numeric',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->HGT = $request->HGT;
        $supplier->INT = $request->INT;
        $supplier->Febri = $request->Febri;
        $supplier->TC = $request->TC;
        $supplier->Biasa = $request->Biasa;
        $supplier->Lebar = $request->Lebar;

        // Menghitung total kain berdasarkan penjumlahan bidang-bidang
        $jumlah_kain = $request->HGT + $request->INT + $request->Febri + $request->TC + $request->Biasa + $request->Lebar;
        $supplier->jumlah_kain = $jumlah_kain;

        $supplier->save();

        return redirect()->route('suppliers.index')->with('success', 'Data supplier berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $supplier = Supplier::find($id);


        // Alert::success('Deleted Successfully', 'Supplier Data Deleted.');

        $supplier->delete();
        return redirect()->route('suppliers.index');
    }

}
