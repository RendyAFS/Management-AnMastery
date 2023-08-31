@include('layouts.appadmin')


<div class="modal-header">
    <h2 class="modal-title ">Absensi Karyawan</h2>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<div class="row">
    <div class="col-md-3 col-sm-12">
        <h3 class="text-center mt-4">
            {{ old('nama_karyawan', $employee->nama_karyawan) }}
        </h3>
    </div>
    <div class="col-md-4 col-sm-12"></div>
    <div class="col-md-5 col-sm-12">
        <div class="align-items-center text-right mt-4">
            <h5 class="text-center">
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
                {{ $translatedDayName }}, {{ \Carbon\Carbon::now()->isoFormat('D') }} {{ $translatedMonthName }} {{ \Carbon\Carbon::now()->isoFormat('Y') }}
            </h5>
        </div>
    </div>
</div>



<div class="modal-body">
    <div class="container">
        <form action="{{ route('absensis.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->


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

            <table class="table table-bordered">
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


            {{-- ABSENSI --}}
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
</div>



