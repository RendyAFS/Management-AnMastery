@include('layouts.appadmin')

<div class="modal-header">
    <h3 class="modal-title">Absebsi Karyawan</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<div class="modal-body">
    <form action="{{ route('absensis.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->

        <h3>
            {{ old('nama_karyawan', $employee->nama_karyawan) }}
        </h3>


        {{-- HIDDEN --}}
        <div>
            <div class="form-group mt-3">
                {{-- <label for="nama_karyawan" class="fw-bold">Nama Karyawan</label> --}}
                <input type="hidden" class="form-control border-dark" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan', $employee->nama_karyawan) }}" required>
                @error('nama_karyawan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                {{-- <label for="umur" class="fw-bold">Umur</label> --}}
                <input type="hidden" class="form-control border-dark" id="umur" name="umur" value="{{ old('umur', $employee->umur) }}" required>
                @error('umur')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                {{-- <label for="alamat" class="fw-bold">Alamat</label> --}}
                <input type="hidden" class="form-control border-dark" id="alamat" name="alamat" value="{{ old('alamat', $employee->alamat) }}" required>
                @error('alamat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                {{-- <label for="nohp" class="fw-bold">Nomor HP</label> --}}
                <input type="hidden" class="form-control border-dark" id="nohp" name="nohp" value="{{ old('nohp', $employee->nohp) }}" required>
                @error('nohp')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- HIDDEN --}}
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr class="text-center">
                    <th class="text-center">Senin</th>
                    <th class="text-center">Selasa</th>
                    <th class="text-center">Rabu</th>
                    <th class="text-center">Kamis</th>
                    <th class="text-center">Jumat</th>
                    <th class="text-center">Sabtu</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="senin_checkbox_pagi"> Pagi<br>
                        <input type="checkbox" name="senin_checkbox_siang"> Siang<br>
                        <input type="checkbox" name="senin_checkbox_lembur"> Lembur
                    </td>
                    <td>
                        <input type="checkbox" name="selasa_checkbox_pagi"> Pagi<br>
                        <input type="checkbox" name="selasa_checkbox_siang"> Siang<br>
                        <input type="checkbox" name="selasa_checkbox_lembur"> Lembur
                    </td>
                    <td>
                        <input type="checkbox" name="rabu_checkbox_pagi"> Pagi<br>
                        <input type="checkbox" name="rabu_checkbox_siang"> Siang<br>
                        <input type="checkbox" name="rabu_checkbox_lembur"> Lembur
                    </td>
                    <td>
                        <input type="checkbox" name="kamis_checkbox_pagi"> Pagi<br>
                        <input type="checkbox" name="kamis_checkbox_siang"> Siang<br>
                        <input type="checkbox" name="kamis_checkbox_lembur"> Lembur
                    </td>
                    <td>
                        <input type="checkbox" name="jumat_checkbox_pagi"> Pagi<br>
                        <input type="checkbox" name="jumat_checkbox_siang"> Siang<br>
                        <input type="checkbox" name="jumat_checkbox_lembur"> Lembur
                    </td>
                    <td>
                        <input type="checkbox" name="sabtu_checkbox_pagi"> Pagi<br>
                        <input type="checkbox" name="sabtu_checkbox_siang"> Siang<br>
                        <input type="checkbox" name="sabtu_checkbox_lembur"> Lembur
                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>




        {{-- ABSENSI --}}
        <div class="form-group mt-3">
            <label for="total_absensi" class="fw-bold">Total Absen</label>
            <input type="number" class="form-control border-dark" id="total_absensi" name="total_absensi" value="{{ old('total_absensi', $employee->total_absensi) }}" required>
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



