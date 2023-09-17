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
                <div class="row">
                    <div class="col">
                        <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3 shadow">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable shadow"
                            id="tabelkaryawanabsensi">
                                <thead>
                                    <tr class="text-center">
                                        <th >id</th>
                                        <th class="text-center" id="th">No.</th>
                                        <th class="text-center" id="th">Nama Karyawan</th>
                                        <th>Umur</th>
                                        <th id="th">Total Absensi</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center" id="th">Nomor Hp</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
            $("#tabelkaryawanabsensi").DataTable({
                serverSide: true,
                processing: true,
                ajax: "getkaryawansabsensi",
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
                        data: "nama_karyawan",
                        name: "nama_karyawan",
                        className: 'align-middle',
                        searchable: true,
                        render: function(data, type, row, meta) {
                            // Menambahkan "Tahun" setelah data umur
                            return " " + data;
                        }
                    },
                    {
                        data: "umur",
                        name: "umur",
                        className: 'align-middle text-center',
                        visible: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            // Menambahkan "Tahun" setelah data umur
                            return data + ' Tahun';
                        }
                    },
                    { data: "total_absensi", name: "total_absensi", visible: true, orderable: true, className: 'align-middle text-center',},
                    { data: "alamat", name: "alamat", visible: false, orderable: false },
                    { data: "nohp", name: "nohp", visible: true, orderable: false, className: 'align-middle text-center' },
                ],
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"],
                ],
            });

        });
    </script>
@endpush

