@extends('layouts.appadmin')

@section('content')
<style>
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
</style>
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbar1')

        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <h1>Tabel Income</h1>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">


                </div>
            </div><hr>
            <div class="contaiener mt-5">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="border border-4 rounded-2">
                            <div class="p-2  bg-white rounded shadow" >
                                {!! $chart->container() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="mt-5 pt-5">
                            <form action="{{ route('incomes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3><i class="bi bi-cash-coin"></i> Input Pemasukkan </h3>
                                    </div>
                                    <div class="card-body">
                                        <label for="uang_kotor" class="fw-bold mt-4 mb-3 fs-6">Pemasukkan:</label>
                                        <div class="d-flex">
                                            @php
                                                $total_gaji = 0;
                                            @endphp

                                            @foreach ($payments as $payment)
                                                {{-- {{$payment->total_gaji}} --}}
                                                @php
                                                    $total_gaji += $payment->total_gaji;
                                                @endphp
                                            @endforeach
                                            <p class="mt-2 me-1">Rp</p><input type="number" name="uang_kotor" id="uang_kotor" class="form-control w-75 me-3" required>
                                            <input type="number" name="gaji_karyawan" id="gaji_karyawan" class="form-control  w-75 me-3 shadow" value="{{ $total_gaji }}" required style="display: none">
                                            <button type="submit" class="btn btn-primary w-25 shadow">
                                                Input
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-5 d-flex justify-content-center">
                                        <a href="#tabelincome" class="btn btn-success shadow me-2">
                                            <i class="bi bi-table me-2"></i>Data Incomes
                                        </a>
                                        <a href="#ResetDataIncome" class="btn btn-danger shadow" data-bs-toggle="modal" data-bs-target="#deleteIncome">
                                            <i class="bi bi-arrow-clockwise "></i> Data Incomes
                                        </a>
                                    </div>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="deleteIncome" tabindex="-1" aria-labelledby="deleteIncomeLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="deleteIncomeLabel">Peringatan!!!</h3>
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
                                                        Menghapus Semua data Income?
                                                    </h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-12">
                                                            <div class="d-flex justify-content-center">
                                                                <form action="{{ route('deletealli') }}" method="POST">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3 shadow">
                                <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable shadow" style="cursor: default"
                                id="tabelincome">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th class="text-center">No.</th>
                                            <th>Uang Kotor</th>
                                            <th>Gaji Karyawan</th>
                                            <th class="text-center">Uang Bersih</th>
                                            <th class="text-right">Tanggal</th>
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
</div>
@endsection
@push('scripts')
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
    <script type="module">
       $(document).ready(function() {
            $("#tabelincome").DataTable({
                serverSide: true,
                processing: true,
                ajax: "getincomes",
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
                        data: "uang_kotor",
                        name: "uang_kotor",
                        className: 'align-middle text-center',
                        searchable: true,
                        render: function(data, type, row) {
                            // Mengubah data menjadi format rupiah
                            return formatRupiah(data);
                        }
                    },
                    {
                        data: "gaji_karyawan",
                        name: "gaji_karyawan",
                        className: 'align-middle text-center',
                        searchable: true,
                        render: function(data, type, row) {
                            // Mengubah data menjadi format rupiah
                            return formatRupiah(data);
                        }
                    },
                    {
                        data: "uang_bersih",
                        name: "uang_bersih",
                        className: 'align-middle',
                        searchable: true,
                        className: 'align-middle text-center',
                        render: function(data, type, row) {
                            // Mengubah data menjadi format rupiah
                            return formatRupiah(data);
                        }
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                        className: 'align-middle text-center',
                        searchable: false,
                        render: function(data, type, row) {
                            // Mengubah data tanggal ke format nama hari, DD-MM-YYYY
                            var date = new Date(data);
                            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            return date.toLocaleDateString('id-ID', options);
                        },
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
