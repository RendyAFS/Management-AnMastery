@include('layouts.appadmin')


<div class="modal-header">
    <h3 class="modal-title">Edit Karyawan</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<div class="modal-body">
    <form action="{{ route('absensis.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->

        <div class="form-group mt-3">
            <label for="nama_karyawan" class="fw-bold">Nama Karyawan</label>
            <input type="text" class="form-control border-dark" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan', $employee->nama_karyawan) }}" required>
            @error('nama_karyawan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="umur" class="fw-bold">Umur</label>
            <input type="number" class="form-control border-dark" id="umur" name="umur" value="{{ old('umur', $employee->umur) }}" required>
            @error('umur')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="alamat" class="fw-bold">Alamat</label>
            <textarea class="form-control border-dark" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $employee->alamat) }}</textarea>
            @error('alamat')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="nohp" class="fw-bold">Nomor HP</label>
            <input type="number" class="form-control border-dark" id="nohp" name="nohp" value="{{ old('nohp', $employee->nohp) }}" required>
            @error('nohp')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- ABSENSI --}}
        <div class="form-group mt-3">
            {{-- <label for="total_absensi" class="fw-bold">Total Absen</label> --}}
            <input type="hidden" class="form-control border-dark" id="total_absensi" name="total_absensi" value="{{ old('total_absensi', $employee->total_absensi) }}" required>
            @error('total_absensi')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-3 d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <div class="col-3 d-grid">
                <a href="" class="btn btn-danger me-1" data-bs-dismiss="modal" aria-label="Close">
                    Batal
                </a>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
</div>
