@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark position-fixed" style="height: 100vh; overflow-y: auto;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="{{ route('dashboards.index') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Main Menu</span>
                </a>
                {{-- NAV ITEM --}}
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('dashboards.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-house-fill"></i> <span class="ms-1 d-none d-sm-inline"></span>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('suppliers.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-dropbox"></i> <span class="ms-1 d-none d-sm-inline"></span>Supplier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle " >
                            <i class="fs-4 bi bi-person-fill"></i> <span class="ms-1 d-none d-sm-inline"></span>Karyawan <i class="bi-caret-down-fill align-middle"></i>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('absensis.index') }}" class="nav-link px-0 ps-2">
                                    <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right"></i> </span> Absensi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('onproses.index') }}" class="nav-link px-0 ps-2">
                                    <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right"></i> </span> Onproses
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gajis.index') }}" class="nav-link px-0 ps-2">
                                    <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right"></i> </span> Gaji
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('incomes.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-cash-coin"></i> <span class="ms-1 d-none d-sm-inline"></span>Incomes</a>
                    </li>
                </ul>
                {{-- NAV ITEM --}}
                <hr>
                <div class="dropdown pb-4">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <h1>Tabel Income</h1>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">


                </div>
            </div>
            <div class="contaiener mt-5">
                <div class="row">
                    <div class="col-lg-5">
                        <form action="{{ route('incomes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h3>Input Pemasukkan</h3>
                                </div>
                                <div class="card-body">
                                    <label for="uang_kotor" class="fw-bold">Pemasukkan:</label>
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
                                        <input type="number" name="uang_kotor" id="uang_kotor" class="form-control w-75 me-3" required>
                                        <input type="number" name="gaji_karyawan" id="gaji_karyawan" class="form-control w-75 me-3" value="{{ $total_gaji }}" required style="display: none">
                                        <button type="submit" class="btn btn-primary w-25 ">
                                            Input
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7">
                        Next Graph Pemasukan ...
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3">
                                <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable"
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
                    className: 'align-middle',
                    searchable: true,
                    render: function(data, type, row) {
                        // Mengubah data menjadi format rupiah
                        return formatRupiah(data);
                    }
                },
                {
                    data: "gaji_karyawan",
                    name: "gaji_karyawan",
                    className: 'align-middle',
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
