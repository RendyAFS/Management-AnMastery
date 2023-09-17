@extends('layouts.appadmin')

@section('content')
<style>
    /* Gaya umum untuk tabel */
    #gajiTable {
        width: 100%;
        border-collapse: collapse;
        margin: 1em 0;
        border: solid 2px rgba(128, 128, 128, 0.1);

    }

    #gajiTable th,
    #gajiTable td {
        padding: 8px 10px;
        text-align: left;
        border: solid 1px rgba(128, 128, 128, 0.5);
    }

    /* Gaya untuk baris header */
    #gajiTable thead tr {
        background-color: #f2f2f2;
    }

    /* Gaya untuk baris data */
    #gajiTable tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    #tablecontainer{
        border: solid 2px rgba(128, 128, 128, 0.1);
        border-radius: 5px;
        padding: 10px;
    }
    .myTextarea {
        border: none;
        resize: none;
        outline: none;
        background-color: transparent;
    }
    .peringatan {
        animation: zoomOut 0.35s ease-in-out;
    }

    @keyframes zoomOut {
        0% {
            opacity: 0;
            transform: scale(1.5);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }

    }
    #th{
        background-color: #393E46;
        color: #EEEEEE
    }

</style>


<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbar2')

        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="bg-judul p-2" style="width: 51%">
                        <h1 class="ms-2">Gaji Karyawan</h1>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <a href="" class="btn btn-danger d-flex align-items-center me-2 shadow" data-bs-toggle="modal" data-bs-target="#deleteGaji">
                            <i class="bi bi-trash-fill align-middle fs-4 me-2"></i> Hapus Semua Gaji
                        </a>


                        <a href="" class="btn btn-primary d-flex align-items-center ms-2 shadow" data-bs-toggle="modal" data-bs-target="#InputGaji">
                            <i class="bi bi-credit-card-2-back align-middle fs-4 me-2"></i> Input Gaji
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteGaji" tabindex="-1" aria-labelledby="deleteGajiLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="deleteGajiLabel">Peringatan!!!</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex justify-content-center peringatan">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" fill="#F68731" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                        </svg>
                                    </div>
                                    <h4 class="text-center mt-3">
                                        Apakah Anda Yakin <br>
                                        Menghapus Semua Gaji Karyawan?
                                    </h4>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('deleteall') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger me-2">Ya, Hapus Semua</button>
                                                </form>
                                                <button type="button" class="btn btn-success ms-2" data-bs-dismiss="modal">Batalkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="InputGaji" tabindex="-1" aria-labelledby="InputGajiLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="InputGajiLabel">Input Gaji</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('admin.actions.inputgaji')
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            {{-- Table Gaji --}}
            <div class="container mt-5">
                <div class="col-lg-12">
                    <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3 shadow">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable shadow"
                        id="tabelgaji">
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
        $("#tabelgaji").DataTable({
            serverSide: true,
            processing: true,
            ajax: "getgaji",
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
