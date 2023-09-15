<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Karyawan';
        confirmDelete();
        return view('admin.absensi',compact('pageTitle'));
    }

    public function getData(Request $request)
    {
        $employees = Employee::all();

        if ($request->ajax()) {
            return datatables()->of($employees)
                ->addIndexColumn()
                ->addColumn('actions', function($employee) {
                    return view('admin.actions.actionemployee', compact('employee'));
                })
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

        // ELOQUENT
        $employee = new Employee;
        $employee->nama_karyawan = $request->nama_karyawan;
        $employee->umur = $request->umur;
        $employee->alamat = $request->alamat;
        $employee->nohp = $request->nohp;

        // Alert
        if ($employee->save()) {
            $message = "Karyawan " . $employee->nama_karyawan . " berhasil ditambahkan.";
            Alert::success('Berhasil Menambahkan', $message);
        } else {
            Alert::error('Gagal Menambahkan', 'Terjadi kesalahan saat menambahkan karyawan.');
        }
        return redirect()->route('absensis.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function absensi(string $id)
    {
        $pageTitle = 'Absensi Karayawan';
        $employee = Employee::find($id);
        return view('admin.actions.absenkaryawan', compact('employee', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mendefinisikan pesan kesalahan untuk validasi input
        $messages = [
            'required' => ':attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_karyawan' => 'required',
            'umur' => 'numeric',
            'alamat' => 'required',
            'nohp' => 'required|numeric',
            'total_absensi' => 'numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menggunakan model Employee, cari data yang akan diperbarui berdasarkan ID
        $employee = Employee::find($id);

        if (!$employee) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan.');
        }

        // Update data karyawan
        $employee->nama_karyawan = $request->nama_karyawan;
        $employee->umur = $request->umur;
        $employee->alamat = $request->alamat;
        $employee->nohp = $request->nohp;
        $employee->total_absensi = $request->total_absensi;

        // Alert
        if ($employee->save()) {
            $message = "Karyawan " . $employee->nama_karyawan . " berhasil diperbarui.";
            Alert::success('Berhasil Memperbarui', $message);
        } else {
            Alert::error('Gagal Memperbarui', 'Terjadi kesalahan saat memperbarui karyawan.');
        }

        return redirect()->route('absensis.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $employee = Employee::find($id);


        // Alert::success('Deleted Successfully', 'employee Data Deleted.');

        $employee->delete();
        return redirect()->route('absensis.index');
    }

}
