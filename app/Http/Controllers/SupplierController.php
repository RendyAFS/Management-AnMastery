<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('admin.supplier', [
            'suppliers' => $suppliers,
        ]);
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
        return redirect()->route('supplier');

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
