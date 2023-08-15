@include('layouts.appadmin')

<div class="modal fade" id="addKaryawanModal" tabindex="-1" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addKaryawanModalLabel">Tambah Karyawan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('absensis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- CSRF token -->

                    <div class="form-group mt-3">
                        <label for="nama_karyawan" class="fw-bold">Nama Karyawan</label>
                        <input type="text" class="form-control border-dark" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan') }}" required>
                        @error('nama_karyawan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="umur" class="fw-bold">Umur</label>
                        <input type="number" class="form-control border-dark" id="umur" name="umur" value="{{ old('umur') }}" required>
                        @error('umur')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="alamat" class="fw-bold">Alamat</label>
                        <textarea class="form-control border-dark" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="nohp" class="fw-bold">Nomor HP</label>
                        <input type="number" class="form-control border-dark" id="nohp" name="nohp" value="{{ old('nohp') }}" required>
                        @error('nohp')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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

            </div>
        </div>
    </div>
</div>
