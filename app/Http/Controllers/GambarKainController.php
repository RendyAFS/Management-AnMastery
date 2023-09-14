<?php

namespace App\Http\Controllers;

use App\Models\PictureFabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $file = $request->file('pic');

        if ($file != null) {
            // Dapatkan nama asli file
            $pic = $file->getClientOriginalName();

            // Simpan file dengan nama asli
            $file->storeAs('public/gambar_kain', $pic);
        }

        $pictures = new PictureFabric;
        $pictures->gambar_kain = $request->gambar_kain;

        // Simpan nama file asli ke dalam kolom 'pic'
        if ($file != null) {
            $pictures->pic = $pic;
        }

        $pictures->save();
        Alert::success('Berhasil Menambahkan Gambar');
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
        $pic = PictureFabric::find($id);
        return view('admin.actions.editgambar', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi request sesuai kebutuhan Anda
        $request->validate([
            // Tambahkan validasi sesuai kolom-kolom yang perlu divalidasi
        ]);

        // Temukan entri berdasarkan ID
        $picture = PictureFabric::findOrFail($id);

        // Tangkap file yang diunggah (jika ada)
        $file = $request->file('pic');

        if ($file != null) {
            // Dapatkan nama asli file
            $pic = $file->getClientOriginalName();

            // Simpan file dengan nama asli
            $file->storeAs('public/gambar_kain', $pic);

            // Hapus file lama jika ada
            if ($picture->pic != null) {
                Storage::delete('public/gambar_kain/' . $picture->pic);
            }

            // Update kolom 'pic' dengan nama file baru
            $picture->pic = $pic;
        } else {
            // Jika file tidak diunggah, gunakan gambar yang ada sebelumnya
            $pic = $picture->pic;
        }

        // Update kolom-kolom lainnya sesuai kebutuhan
        $picture->gambar_kain = $request->gambar_kain;

        // Simpan perubahan
        $picture->save();

        Alert::success('Berhasil Memperbarui Gambar');
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
                Storage::delete('public/gambar_kain/' . $pic->pic);
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
