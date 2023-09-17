<?php

namespace App\Http\Controllers;

use App\Models\PictureFabric;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class SupplierController extends Controller
{

    public function index()
    {
        $pics = PictureFabric::orderBy('gambar_kain', 'asc')->get();
        $pageTitle = 'Supplier';
        confirmDelete();
        return view('admin.supplier', compact('pics', 'pageTitle'));

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

        // Alert
        if ($supplier->save()) {
            $message = "Supplier " . $supplier->nama_supplier . " berhasil ditambahkan.";
            Alert::success('Berhasil Menambahkan', $message);
        } else {
            Alert::error('Gagal Menambahkan', 'Terjadi kesalahan saat menambahkan supplier.');
        }
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
        $pageTitle = 'Supplier';
        $supplier = Supplier::find($id);
        return view('admin.actions.editsupplier', compact('supplier','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

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

        if ($supplier->save()) {
            $message = "Supplier " . $supplier->nama_supplier . " berhasil diedit.";
            Alert::success('Berhasil Mengedit', $message);
        } else {
            Alert::error('Gagal Mengedit', 'Terjadi kesalahan saat mengedit supplier.');
        }
        return redirect()->route('suppliers.index')->with('success', 'Data supplier berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $supplier = Supplier::find($id);


        if ($supplier->delete()) {
            $message = "Supplier berhasil dihapus.";
            Alert::success('Berhasil Menghapus', $message);
        } else {
            Alert::error('Gagal Menghapus', 'Terjadi kesalahan saat menghapus supplier.');
            return redirect()->route('suppliers.index');
        }

        return redirect()->route('suppliers.index');
    }
}
