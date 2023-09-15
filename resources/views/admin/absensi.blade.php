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
                        <ul class="collapse nav flex-column ms-1 show" id="submenu2" data-bs-parent="#menu">
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
                <div class="col-xl-10 col-lg-8 col-md-12">
                    <h1>
                        Tabel Absensi
                    </h1>
                </div>


                <div class="col-xl-2 col-lg-4 col-md-12 " >
                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addKaryawanModal">
                            <i class="bi bi-person-circle align-middle me-2 fs-4"></i> Tambah Karyawan
                        </a>
                    </div>
                    <div class="modal fade" id="addKaryawanModal" tabindex="-1" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="addKaryawanModalLabel">Tambah Karyawan</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Modal Tambah Supplier -->
                                    @include('admin.actions.tambahkaryawan')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><hr>
                {{-- END FORM --}}

                {{-- TABEL --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable"
                            id="tabelemployee">
                                <thead>
                                    <tr class="text-center">
                                        <th>id</th>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Karyawan</th>
                                        <th>Umur</th>
                                        <th>Total Absensi</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Nomor Hp</th>
                                        <th class="text-center">Opsi</th>
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
</div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#tabelemployee").DataTable({
                serverSide: true,
                processing: true,
                ajax: "getemployees",
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
                    { data: "actions", name: "actions", orderable: false, searchable: false, width: "5%" },
                ],
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"],
                ],
            });

            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var nama_karyawan = form.data("nama_karyawan");

                Swal.fire({
                    title: "Apakah Anda Yakin Menghapus Karyawan " + nama_karyawan + "?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
