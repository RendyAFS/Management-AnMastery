<?php

namespace App\Http\Controllers;

use App\Models\PictureFabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GambarKainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $messages = [
            'mimes' => 'Format file :harus .jpg, .png, atau .jpeg'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'pic' => 'required|mimes:jpg,png,jpeg',
        ], $messages);

        if ($validator->fails()) {
            Alert::error('Gagal Menambahkan', 'Terjadi kesalahan Menambahkan Gambar Kain.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('pic');

        if ($file != null) {
            // Dapatkan nama asli file
            $pic = $file->getClientOriginalName();

            // Simpan file dengan nama asli
            $file->move('storage/gambar_kain', $pic);
        }

        $pictures = new PictureFabric;
        $pictures->gambar_kain = $request->gambar_kain;

        // Simpan nama file asli ke dalam kolom 'pic'
        if ($file != null) {
            $pictures->pic = $pic;
        }
        // Alert
        if ($pictures->save()) {
            Alert::success('Berhasil Menambahkan Gambar Kain');
        } else {
            Alert::error('Gagal Menambahkan', 'Terjadi kesalahan Menambahkan Gambar Kain.');
        }
        return redirect()->route('suppliers.index');
    }


    /**
     * Dizsplay the specified resource.
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
        $pic = PictureFabric:: find($id);
        return view('admin.actions.editgambar', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'mimes' => 'Format file :harus .jpg, .png, atau .jpeg'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'pic' => 'sometimes|mimes:jpg,png,jpeg',
        ], $messages);

        if ($validator->fails()) {
            Alert::error('Gagal Mengedit', 'Terjadi kesalahan Mengedit Gambar Kain.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Temukan entri berdasarkan ID
        $pictures = PictureFabric::findOrFail($id);

        // Tangkap file yang diunggah (jika ada)
        $file = $request->file('pic');

        if ($file != null) {
            // Dapatkan nama asli file
            $pic = $file->getClientOriginalName();

            // Simpan file dengan nama asli
            $file->move('storage/gambar_kain', $pic);

            // Hapus file lama jika ada
            if ($pictures->pic != null) {
                File::delete('storage/gambar_kain/' . $pictures->pic);
            }

            // Update kolom 'pic' dengan nama file baru
            $pictures->pic = $pic;
        }

        // Update kolom-kolom lainnya sesuai kebutuhan
        $pictures->gambar_kain = $request->gambar_kain;

        // Simpan perubahan
        if ($pictures->save()) {
            Alert::success('Berhasil Mengedit Gambar Kain');
        } else {
            Alert::error('Gagal Mengedit', 'Terjadi kesalahan Mengedit Gambar Kain.');
        }
        return redirect()->route('suppliers.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan entri berdasarkan ID
        $pic = PictureFabric::find($id);

        if ($pic) {
            // Hapus file terkait jika ada
            if ($pic->pic != null) {
                File::delete('storage/gambar_kain/' . $pic->pic);
            }

            // Hapus entri dari database
            $pic->delete();

            Alert::success('Berhasil Terhapus', 'Gambar Kain Berhasil Terhapus.');
        } else {
            Alert::error('Gagal', 'Gambar Kain tidak ditemukan.');
        }

        return redirect()->route('suppliers.index');
    }

}
