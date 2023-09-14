@include('layouts.appadmin')
<form action="{{ route('absensis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF token -->

    <div class="form-group mt-3">
        <label for="nama_karyawan" class="fw-bold">Nama Karyawan</label>
        <input type="text" class="form-control border-dark" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan') }}" required>
    </div>

    <div class="form-group mt-3">
        <label for="umur" class="fw-bold">Umur</label>
        <input type="number" class="form-control border-dark" id="umur" name="umur" value="{{ old('umur') }}" required>
    </div>

    <div class="form-group mt-3">
        <label for="alamat" class="fw-bold">Alamat</label>
        <textarea class="form-control border-dark" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label for="nohp" class="fw-bold">Nomor HP</label>
        <input type="number" class="form-control border-dark" id="nohp" name="nohp" value="{{ old('nohp') }}" required>
    </div>

    <div class="row mt-4">
        <div class="col-3"></div>
        <div class="col-3 d-grid">
            <button type="submit" class="btn btn-primary ">Tambah</button>
        </div>
        <div class="col-3 d-grid">
            <a href="" class="btn btn-danger me-1" data-bs-dismiss="modal" aria-label="Close">
                Batal
            </a>
        </div>
        <div class="col-3"></div>
    </div>
</form>
