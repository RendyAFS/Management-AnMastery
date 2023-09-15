@include('layouts.appadmin')
<style>
    label{
        font-weight: bold;
    }

</style>

<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-8">
                <label for="detail_proses"> Detail Proses:</label>
                <select name="detail_proses" id="detail_proses" class="form-select" required>
                    <option value=""></option>
                    @php
                        $fabricOptions = [];
                    @endphp
                    @foreach ($fabrics as $fabric)
                        @php
                            $fabricData = $fabric->supplier->nama_supplier . ' - ' .
                                          $fabric->typefabric->jenis_kain . ' - ' .
                                          $fabric->typecolor->jenis_warna . ' - ' .
                                          $fabric->picturefabric->gambar_kain;
                        @endphp

                        @if (!in_array($fabricData, $fabricOptions))
                            <option value="{{ $fabric->id }}" data-color="{{ $fabric->typecolor->id }}">
                                {{ $fabricData }}
                            </option>
                            @php
                                $fabricOptions[] = $fabricData;
                            @endphp
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label for="harga_kain">Harga Kain/Meter:</label>
                <select name="harga_kain" id="harga_kain" class="form-select" required>
                    <option value=""></option>
                    @foreach ($gajis as $gaji)
                    <option value="{{ $gaji->harga_karyawan }}">
                        Rp {{$gaji->harga_karyawan}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-lg-6">
                <label for="krem"><i class="bi bi-square-fill" style="color:rgb(227, 220, 220)"></i> Krem:</label>
                <input type="number" name="krem" id="krem" class="form-control rounded" value="0"><br>
                <label for="blewah"><i class="bi bi-square-fill" style="color:rgb(217, 162, 104)"></i> Blewah:</label>
                <input type="number" name="blewah" id="blewah" class="form-control rounded" value="0"><br>
                <label for="jambon"><i class="bi bi-square-fill" style="color:rgb(255, 135, 223)"></i> Jambon:</label>
                <input type="number" name="jambon" id="jambon" class="form-control rounded" value="0"><br>
                <label for="biru"><i class="bi bi-square-fill" style="color:rgb(100, 171, 247)"></i> Biru: </label>
                <input type="number" name="biru" id="biru" class="form-control rounded" value="0"><br>
            </div>
            <div class="col-lg-6">
                <label for="coklat"><i class="bi bi-square-fill" style="color:rgb(177, 155, 155)"></i> Coklat: </label>
                <input type="number" name="coklat" id="coklat" class="form-control rounded" value="0"><br>
                <label for="hijau"><i class="bi bi-square-fill" style="color:rgb(146, 230, 142)"></i> Hijau: </label>
                <input type="number" name="hijau" id="hijau" class="form-control rounded" value="0"><br>
                <label for="ungu"><i class="bi bi-square-fill" style="color:rgb(187, 143, 231)"></i> Ungu: </label>
                <input type="number" name="ungu" id="ungu" class="form-control rounded" value="0"><br>
                <label for="kuning"><i class="bi bi-square-fill" style="color:rgb(249, 234, 106)"></i> Kuning: </label>
                <input type="number" name="kuning" id="kuning" class="form-control rounded" value="0"><br>
            </div>
        </div>



        {{-- Button --}}
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-add me-2"><i class="bi bi-cart-plus"></i> Masukkan</button>
                    <button class="btn btn-danger ms-2" id="resetButton"> <i class="bi bi-trash3-fill"></i> Panjang Kain </button>
                </div>
            </div>
        </div>
    </div>


    {{-- FORM INPUT TO DATABASE --}}
    <div class="col-lg-6">
        <form action="{{ route('gajis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
            <label for="nama">Nama Karyawan:</label>
            <select name="nama" id="nama" class="form-select" required>
                <option value=""></option>
                @php
                    $namaKaryawanList = [];
                @endphp
                @foreach ($fabrics as $fabric)
                    @php
                        $namaKaryawan =
                        $fabric->employee->nama_karyawan
                    @endphp

                    @if (!in_array($namaKaryawan, $namaKaryawanList))
                        <option value="{{ $fabric->employee->nama_karyawan }}" data-absensi="{{ $fabric->employee->total_absensi }}">
                            {{ $namaKaryawan }}
                            {{-- {{ $fabric->employee->total_absensi }} --}}
                        </option>
                        @php
                            $namaKaryawanList[] = $namaKaryawan;
                        @endphp
                    @endif
                @endforeach
            </select><br>
            <textarea name="deskripsi" id="deskripsi" cols="70" rows="8"></textarea>

            <label for="total_gaji">Total Gaji:</label>
            <div class="d-flex">
                <p class="mt-2 me-1">Rp </p><input type="text" name="total_gaji" id="total_gaji" class="form-control" value="0">
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2" id="tambah"  ><i class="bi bi-database-fill-up"></i> Tambah</button>
                        <button type="button" id="resetTotalGajiButton" class="btn btn-danger ms-2">
                            <i class="bi bi-trash-fill"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // Function to calculate total gaji
    var currentTotalGaji = 0;

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        var formatted = ribuan.join('.').split('').reverse().join('');
        return formatted;
    }

    // Function to append value to deskripsi textarea
    function appendToDeskripsi() {
        var selectedOption = document.getElementById('detail_proses');
        var deskripsiTextarea = document.getElementById('deskripsi');
        var selectedOptionText = selectedOption.options[selectedOption.selectedIndex].text;
        // Calculate total gaji
        var kremValue = parseInt(document.getElementById('krem').value) || 0;
        var blewahValue = parseInt(document.getElementById('blewah').value) || 0;
        var jambonValue = parseInt(document.getElementById('jambon').value) || 0;
        var biruValue = parseInt(document.getElementById('biru').value) || 0;
        var coklatValue = parseInt(document.getElementById('coklat').value) || 0;
        var hijauValue = parseInt(document.getElementById('hijau').value) || 0;
        var unguValue = parseInt(document.getElementById('ungu').value) || 0;
        var kuningValue = parseInt(document.getElementById('kuning').value) || 0;
        var hargaKaryawanValue = parseInt(document.getElementById('harga_kain').value) || 0;

        // Mendapatkan nilai data-color yang terpilih
        var selectElement = document.getElementById('detail_proses');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var dataColor = parseInt(selectedOption.getAttribute('data-color')) || 1;

        var totalGajiBaru = ((kremValue + blewahValue + jambonValue + biruValue + coklatValue + hijauValue + unguValue + kuningValue) * hargaKaryawanValue) / dataColor;

        // Bulatkan totalGajiBaru ke atas
        totalGajiBaru = Math.ceil(totalGajiBaru);

        // Format totalGajiBaru sebagai mata uang Rupiah dan hapus .00
        var formattedTotal = "Rp " + totalGajiBaru.toLocaleString('id-ID', { minimumFractionDigits: 0 });

        // Check if the textarea already has content
        if (deskripsiTextarea.value.length > 0) {
            // Add a newline character and the total gaji before appending the selected option text
            deskripsiTextarea.value += "\n" + selectedOptionText + " - Total: " + formattedTotal;
        } else {
            deskripsiTextarea.value = selectedOptionText + " - Total: " + formattedTotal;
        }
    }


    function addToTotalGaji() {
        var kremValue = parseInt(document.getElementById('krem').value) || 0;
        var blewahValue = parseInt(document.getElementById('blewah').value) || 0;
        var jambonValue = parseInt(document.getElementById('jambon').value) || 0;
        var biruValue = parseInt(document.getElementById('biru').value) || 0;
        var coklatValue = parseInt(document.getElementById('coklat').value) || 0;
        var hijauValue = parseInt(document.getElementById('hijau').value) || 0;
        var unguValue = parseInt(document.getElementById('ungu').value) || 0;
        var kuningValue = parseInt(document.getElementById('kuning').value) || 0;

        // Mendapatkan nilai data-color yang terpilih
        var selectElement = document.getElementById('detail_proses');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var dataColor = parseInt(selectedOption.getAttribute('data-color')) || 1;

        // Validasi input
        if (!isNaN(kremValue) && !isNaN(blewahValue) && !isNaN(jambonValue) && !isNaN(biruValue) &&
            !isNaN(coklatValue) && !isNaN(hijauValue) && !isNaN(unguValue) && !isNaN(kuningValue) && !isNaN(dataColor)) {

            var hargaKaryawanValue = parseInt(document.getElementById('harga_kain').value) || 0;

            var totalGajiInput = document.getElementById('total_gaji');

            var totalGajiBaru = ((kremValue + blewahValue + jambonValue + biruValue + coklatValue + hijauValue + unguValue + kuningValue) * hargaKaryawanValue) / dataColor;

            if (!isNaN(totalGajiBaru)) {
                // Bulatkan totalGajiBaru ke atas
                totalGajiBaru = Math.ceil(totalGajiBaru);
                // Tambahkan total gaji baru ke total gaji saat ini
                currentTotalGaji += totalGajiBaru;
                var formattedTotalGaji = (currentTotalGaji);
                totalGajiInput.value =formattedTotalGaji; // Update total gaji dengan format rupiah
            }
        }
    }

    // Add event listener to the "Tambah" button
    document.querySelector('.btn-add').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        appendToDeskripsi(); // Append value to deskripsi textarea
        addToTotalGaji(); // Add to total gaji and format it as Rupiah
    });



    function updateTotalGajiFromSelect() {
        // Mendapatkan nilai data-absensi yang terpilih
        var selectElement = document.getElementById('nama');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var dataAbsensi = parseInt(selectedOption.getAttribute('data-absensi')) || 0;

        // Kalikan nilai yang dipilih dengan 5000
        dataAbsensi *= 5000;

        var totalGajiInput = document.getElementById('total_gaji');
        var currentTotalGaji = parseInt(totalGajiInput.value.replace(/\D/g, '')) || 0;

        var updatedTotalGaji = currentTotalGaji + dataAbsensi;
        var formattedTotalGaji = (updatedTotalGaji);

        // Format nilai gaji total dalam format rupiah tanpa .00 dan tanpa simbol Rp
        totalGajiInput.value =formattedTotalGaji;

        var deskripsiTextarea = document.getElementById('deskripsi');
        if (deskripsiTextarea.value.length > 0) {
            // Tambahkan baris baru dan total gaji sebelum menambahkan teks opsi yang dipilih
            deskripsiTextarea.value += "\n" + "\n" + "Bonus Absensi: Rp " + (dataAbsensi);
        } else {
            deskripsiTextarea.value = "Bonus Absensi: Rp " + (dataAbsensi);
        }
    }

    document.getElementById('tambah').addEventListener('click', function () {
        updateTotalGajiFromSelect();
    });


    // Function to reset currentTotalGaji to 0
    function resetTotalGaji() {
        currentTotalGaji = 0;
        hapusdes = "";
        document.getElementById('total_gaji').value = currentTotalGaji;
        document.getElementById('deskripsi').value = hapusdes;
    }

    document.getElementById('resetTotalGajiButton').addEventListener('click', function () {
    resetTotalGaji();
    });

    function resetTotalGaji() {
        var totalGajiInput = document.getElementById('total_gaji');
        totalGajiInput.value = '0'; // Mengatur nilai total gaji menjadi Rp 0
        var deskripsiInput = document.getElementById('deskripsi');
        deskripsiInput.value = ''; // Mengatur nilai total gaji menjadi Rp 0
        currentTotalGaji = 0;
    }

    document.getElementById("resetButton").addEventListener("click", function() {
        // Reset the values of all input fields to 0
        document.getElementById("krem").value = "0";
        document.getElementById("blewah").value = "0";
        document.getElementById("jambon").value = "0";
        document.getElementById("biru").value = "0";
        document.getElementById("coklat").value = "0";
        document.getElementById("hijau").value = "0";
        document.getElementById("ungu").value = "0";
        document.getElementById("kuning").value = "0";
    });


</script>
