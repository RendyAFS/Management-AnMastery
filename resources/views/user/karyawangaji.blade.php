@extends('layouts.appuser')

@section('content')
<style>
    #th{
        background-color: #393E46;
        color: #EEEEEE
    }
</style>
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbaruser')
        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="container mt-4">
                <div class="col-lg-12">
                    <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3 shadow">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable shadow"
                        id="tabelgajikaryawan">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="text-center" id="th">No.</th>
                                    <th class="text-center" id="th" style="width: 200px">Nama Karyawan</th>
                                    <th id="th" >Deskripsi</th>
                                    <th class="text-center" id="th" style="width: 200px">Total Gaji</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="module">
    $(document).ready(function() {
        $("#tabelgajikaryawan").DataTable({
            serverSide: true,
            processing: true,
            ajax: "getkaryawansgaji",
            columns: [
                { data: "id", name: "id", visible: false },
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                    width: "2%",
                    className: 'align-middle text-center',
                    render: function(data, type, row, meta) {
                        // Mengembalikan nomor indeks dengan titik di depannya
                        return (meta.row + 1) + ".";
                    }
                },
                {
                    data: "nama",
                    name: "nama",
                    className: 'align-middle',
                    searchable: true,
                },
                {
                    data: "deskripsi",
                    name: "deskripsi",
                    className: 'align-middle ',
                    searchable: true,
                    orderable:false,
                    render: function(data, type, row) {
                        // Memisahkan deskripsi menjadi baris-baris terpisah
                        var deskripsiArray = data.split('\n');
                        var formattedDeskripsi = deskripsiArray.map(function(item) {
                            return item.trim(); // Menghapus spasi ekstra
                        }).join('<br>'); // Menggunakan <br> sebagai pemisah

                        return formattedDeskripsi;
                    }
                },
                {
                    data: "total_gaji",
                    name: "total_gaji",
                    className: 'align-middle',
                    searchable: false,
                    className: 'align-middle text-center',
                    render: function(data, type, row) {
                        // Mengubah data menjadi format rupiah
                        return formatRupiah(data);
                    }
                },
            ],
            order: [[0, "desc"]],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"],
            ],
        });
        // Fungsi untuk mengubah angka menjadi format rupiah
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            var hasil = ribuan.join('.').split('').reverse().join('');
            return "Rp " + hasil;
        }
    });
</script>
@endpush
