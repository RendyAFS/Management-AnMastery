@extends('layouts.appadmin')


@section('content')
<style>
    /* Misalnya, kita ingin mengubah ukuran checkbox menjadi 1.5 kali lebih besar dari ukuran aslinya */
    input[type="checkbox"] {
        transform: scale(1.4);
        /* Anda juga bisa mengatur properti lain seperti margin jika diperlukan */
        /* margin: 5px; */
    }
    .checkbox-label {
        display: block;
        margin-bottom: 10px;
    }
    .cancel-button {
        position: absolute;
        top: 1px;
        right: 10px;
        font-size: 50px;
        text-decoration: none;
        color: #dc3545; /* Warna merah untuk ikon "X" */
        z-index: 1;
    }

    @media only screen and (max-width: 768px) {
        /* Ubah ukuran font menjadi lebih kecil, misalnya, 30px */
        .cancel-button {
            font-size: 30px;
        }
    }
    .animatedC {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

</style>
<div class="container animatedC mt-5">
    <a href="{{route('absensis.index')}}" class="cancel-button">
        <i class="bi bi-x"></i>
    </a>
    <div class="row">
        <div class="col-lg-4 mx-auto">
            <div class="card">
                <div class="card-header" id="header-edit">
                    <h2 class="modal-title">Edit Karyawan</h2>
                </div>
                <div class="card-body">
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

                        <div class="form-group mt-3" style="display:none">
                            <label for="total_absensi" class="fw-bold">Total Absen</label>
                            <div class="input-group">
                                <input type="number" class="form-control border-dark" id="total_absensi" name="total_absensi" value="{{ old('total_absensi', $employee->total_absensi) }}" required>
                            </div>
                            @error('total_absensi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row mt-4">
                            <div class="col-3"></div>
                            <div class="col-6 d-grid">
                                <button type="submit" class="btn btn-primary ">Edit</button>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @php
                $dayNames = [
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu',
                ];
                $dayName = \Carbon\Carbon::now()->format('l');
                $translatedDayName = $dayNames[$dayName];

                $monthNames = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember',
                ];
                $monthName = \Carbon\Carbon::now()->format('F');
                $translatedMonthName = $monthNames[$monthName];
            @endphp

            <div class="card">
                <div class="card-header" id="header-kalender">
                    <h2 class="modal-title">Kalender</h2>
                </div>
                <div class="card-body text-center">
                    <h4>
                        {{ $translatedDayName }}
                    </h4>
                    <h5>
                    {{ \Carbon\Carbon::now()->isoFormat('D') }} {{ $translatedMonthName }} {{ \Carbon\Carbon::now()->isoFormat('Y') }}
                    </h5>
                </div>
            </div>
            <div class="card card-lg  mt-4">
                <div class="card-header" id="header-absen">
                    <h2 class="modal-title">Absensi Karyawan</h2>
                </div>
                <div class="card-body">
                    <div class="modal-body">
                        <form action="{{ route('absensis.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updates -->

                            {{-- HIDDEN --}}
                            <input type="hidden" name="nama_karyawan" value="{{ old('nama_karyawan', $employee->nama_karyawan) }}" required>
                            <input type="hidden" name="umur" value="{{ old('umur', $employee->umur) }}" required>
                            <input type="hidden" name="alamat" value="{{ old('alamat', $employee->alamat) }}" required>
                            <input type="hidden" name="nohp" value="{{ old('nohp', $employee->nohp) }}" required>
                            {{-- HIDDEN --}}
                            <!-- Table for Checkbox Inputs -->
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>Senin</th>
                                        <th>Selasa</th>
                                        <th>Rabu</th>
                                        <th>Kamis</th>
                                        <th>Jumat</th>
                                        <th>Sabtu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="checkbox-label"><input type="checkbox" name="senin[]" value="Pagi"> Pagi</label>
                                            <label class="checkbox-label"><input type="checkbox" name="senin[]" value="Siang"> Siang</label>
                                            <label class="checkbox-label"><input type="checkbox" name="senin[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label class="checkbox-label"><input type="checkbox" name="selasa[]" value="Pagi"> Pagi</label>
                                            <label class="checkbox-label"><input type="checkbox" name="selasa[]" value="Siang"> Siang</label>
                                            <label class="checkbox-label"><input type="checkbox" name="selasa[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label class="checkbox-label"><input type="checkbox" name="rabu[]" value="Pagi"> Pagi</label>
                                            <label class="checkbox-label"><input type="checkbox" name="rabu[]" value="Siang"> Siang</label>
                                            <label class="checkbox-label"><input type="checkbox" name="rabu[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label class="checkbox-label"><input type="checkbox" name="kamis[]" value="Pagi"> Pagi</label>
                                            <label class="checkbox-label"><input type="checkbox" name="kamis[]" value="Siang"> Siang</label>
                                            <label class="checkbox-label"><input type="checkbox" name="kamis[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label class="checkbox-label"><input type="checkbox" name="jumat[]" value="Pagi"> Pagi</label>
                                            <label class="checkbox-label"><input type="checkbox" name="jumat[]" value="Siang"> Siang</label>
                                            <label class="checkbox-label"><input type="checkbox" name="jumat[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label class="checkbox-label"><input type="checkbox" name="sabtu[]" value="Pagi"> Pagi</label>
                                            <label class="checkbox-label"><input type="checkbox" name="sabtu[]" value="Siang"> Siang</label>
                                            <label class="checkbox-label"><input type="checkbox" name="sabtu[]" value="Lembur"> Lembur</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Total Absen Input -->
                            <div class="form-group mt-3">
                                <label for="total_absensi" class="fw-bold">Total Absen</label>
                                <div class="input-group">
                                    <input type="number" class="form-control border-dark" id="totalCheckedInput" name="total_absensi" value="{{ old('total_absensi', $employee->total_absensi) }}" required>
                                    <button type="button" id="clearTotalChecked" class="btn btn-danger"><i class="bi bi-backspace"></i></button>
                                </div>
                                @error('total_absensi')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="row mt-4">
                                <div class="col-3"></div>
                                <div class="col-6 d-grid">
                                    <button type="submit" class="btn btn-primary">Absen</button>
                                </div>
                                <div class="col-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var totalChecked = parseInt($('#totalCheckedInput').val() || 0);

        // Mengatur nilai input saat halaman dimuat
        $('#totalCheckedInput').val(totalChecked);

        // Fungsi hapus nilai input
        $('#clearTotalChecked').click(function() {
            totalChecked = 0;
            $('#totalCheckedInput').val(totalChecked);
        });

        $('input[type=checkbox]').change(function() {
            if ($(this).prop('checked')) {
                totalChecked++;
            } else {
                totalChecked--;
            }
            $('#totalCheckedInput').val(totalChecked);
        });
    });
</script>

