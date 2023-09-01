@extends('layouts.appadmin')
<style>
    /* Misalnya, kita ingin mengubah ukuran checkbox menjadi 1.5 kali lebih besar dari ukuran aslinya */
    input[type="checkbox"] {
        transform: scale(1.4);
        /* Anda juga bisa mengatur properti lain seperti margin jika diperlukan */
        /* margin: 5px; */
    }
</style>


@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-4 mx-auto"> <!-- Use mx-auto to center the card -->
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
                <div class="card-header">
                    <h2 class="modal-title">Tanggal</h2>
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

            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="modal-title">Identitas Karyawan</h2>
                </div>
                <div class="card-body">
                    <label for="nama_karyawan" class="fw-bold mt-1">Nama Karyawan:</label>
                    <div name="nama_karyawan">
                        <i class="bi bi-arrow-right-circle"></i> {{ old('nama_karyawan', $employee->nama_karyawan) }}
                    </div>

                    <label for="umur" class="fw-bold mt-2">Umur:</label>
                    <div name="umur">
                        <i class="bi bi-arrow-right-circle"></i> {{ old('umur', $employee->umur) }} Tahun
                    </div>

                    <label for="nohp" class="fw-bold mt-2">Nomor HP:</label>
                    <div name="nohp">
                        <i class="bi bi-arrow-right-circle"></i> {{ old('nohp', $employee->nohp) }}
                    </div>

                    <label for="alamat" class="fw-bold mt-2">Alamat:</label>
                    <div name="alamat">
                        <i class="bi bi-arrow-right-circle"></i> {{ old('alamat', $employee->alamat) }}
                    </div>
                </div>
            </div>


        </div>
        <div class="col-8">
            <div class="card card-lg">
                <div class="card-header">
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
                                            <label><input type="checkbox" name="senin[]" value="Pagi"> Pagi</label><br>
                                            <label><input type="checkbox" name="senin[]" value="Siang"> Siang</label><br>
                                            <label><input type="checkbox" name="senin[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label><input type="checkbox" name="selasa[]" value="Pagi"> Pagi</label><br>
                                            <label><input type="checkbox" name="selasa[]" value="Siang"> Siang</label><br>
                                            <label><input type="checkbox" name="selasa[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label><input type="checkbox" name="rabu[]" value="Pagi"> Pagi</label><br>
                                            <label><input type="checkbox" name="rabu[]" value="Siang"> Siang</label><br>
                                            <label><input type="checkbox" name="rabu[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label><input type="checkbox" name="kamis[]" value="Pagi"> Pagi</label><br>
                                            <label><input type="checkbox" name="kamis[]" value="Siang"> Siang</label><br>
                                            <label><input type="checkbox" name="kamis[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label><input type="checkbox" name="jumat[]" value="Pagi"> Pagi</label><br>
                                            <label><input type="checkbox" name="jumat[]" value="Siang"> Siang</label><br>
                                            <label><input type="checkbox" name="jumat[]" value="Lembur"> Lembur</label>
                                        </td>
                                        <td>
                                            <label><input type="checkbox" name="sabtu[]" value="Pagi"> Pagi</label><br>
                                            <label><input type="checkbox" name="sabtu[]" value="Siang"> Siang</label><br>
                                            <label><input type="checkbox" name="sabtu[]" value="Lembur"> Lembur</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Total Absen Input -->
                            <div class="form-group mt-3">
                                <label for="total_absensi" class="fw-bold">Total Absen</label>
                                <div class="input-group">
                                    <input type="number" class="form-control border-dark" id="totalCheckedInput" name="total_absensi" value="{{ old('total_absensi', $employee->total_absensi) }}" required>
                                    <button type="button" id="clearTotalChecked" class="btn btn-secondary"><i class="bi bi-backspace"></i></button>
                                </div>
                                @error('total_absensi')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="row mt-4">
                                <div class="col-3"></div>
                                <div class="col-3 d-grid">
                                    <button type="submit" class="btn btn-primary">Absen</button>
                                </div>
                                <div class="col-3 d-grid">
                                    <a href="{{route('absensis.index')}}" class="btn btn-danger me-1">
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

