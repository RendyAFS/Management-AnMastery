@extends('layouts.appadmin')

@section('content')

<style>
     .animated {
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


        {{-- CONTENT --}}
        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <h1>
                        Tabel Supplier
                    </h1>
                </div>


                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                            <i class="bi bi-plus-circle align-middle fs-4 me-2"></i> Tambah Supplier
                        </a>
                    </div>
                    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="addSupplierModalLabel">Tambah Supplier</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Modal Tambah Supplier -->
                                    @include('admin.actions.tambahsupplier')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END FORM --}}
            </div>


            {{-- TABEL --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable"
                            id="tabelsupplier">
                                <thead>
                                    <tr class="text-center">
                                        <th>id</th>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Jumlah Kain</th>
                                        <th class="text-center">HGT</th>
                                        <th class="text-center">INT</th>
                                        <th class="text-center">Febri</th>
                                        <th class="text-center">TC</th>
                                        <th class="text-center">Biasa</th>
                                        <th class="text-center">Lebar</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <hr><br>
                        <div class="row mt-3 mb-4">
                            <div class="col-lg-4">
                                <h2>Daftar Gambar Kain</h2>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-end">
                                    <a href="" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addGkainModal">
                                        <i class="bi bi-image align-middle fs-4 me-2"></i> Tambah Gambar
                                    </a>
                                </div>

                                {{-- MODAL TAMBAH Gambar --}}
                                <div class="modal fade" id="addGkainModal" tabindex="-1" aria-labelledby="addGkainModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="addGkainModalLabel">Tambah Gambar</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Modal Tambah Supplier -->
                                                @include('admin.actions.tambahgambar')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            @foreach ($pics as $pic )
                                <div class="card m-2" style="max-width: 18rem;">
                                    <img src="{{ asset('storage/gambar_kain/' . $pic->pic) }}" class="card-img-top mt-2" alt="gambar {{$pic->gambar_kain}}"
                                    style="max-width: 18rem; max-height:12rem;" >
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{$pic->gambar_kain}}
                                        </h5>
                                        <a href="editgambar" class="btn btn-primary editg-btn" data-bs-toggle="modal" data-bs-target="#editgambar" data-id="{{ $pic->id }}">Edit</a>
                                        <a href="" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delgambar">Hapus</a>

                                    </div>
                                </div>
                            @endforeach
                            <!-- Modal edit -->
                            <div class="modal fade" id="editgambar" tabindex="-1" aria-labelledby="editgambarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        @include('admin/actions/editgambar')
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Hapus -->
                            <div class="modal fade" id="delgambar" tabindex="-1" aria-labelledby="delgambarLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-3" id="hapusLabel">Peringatan !!!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#F68731" class="bi bi-exclamation-circle animated" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                                </svg>
                                            </div>
                                            <h4 class="text-center mt-3">
                                                Apakah Anda Yakin <br>
                                                Menghapus Gambar?
                                            </h4>
                                            {{-- button --}}
                                            <hr>
                                            <div class="row mb-2 mt-4">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('Gkains.destroy', ['Gkain' => $pic->id]) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-delete">
                                                                Ya, Hapus!
                                                            </button>
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
    </div>
</div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#tabelsupplier").DataTable({
                serverSide: true,
                processing: true,
                ajax: "getsuppliers",
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
                    { data: "nama_supplier", name: "nama_supplier", className: 'align-middle', searchable: true },
                    { data: "alamat", name: "alamat", visible: false, orderable: false, },
                    { data: "jumlah_kain", name: "jumlah_kain", className: 'align-middle text-center', searchable: false,orderable: false, },
                    { data: "HGT", name: "HGT", width: "7%", className: 'align-middle text-center', searchable: false,orderable: false, },
                    { data: "INT", name: "INT", width: "7%", className: 'align-middle text-center', searchable: false,orderable: false, },
                    { data: "Febri", name: "Febri", width: "7%", className: 'align-middle text-center', searchable: false, orderable: false,},
                    { data: "TC", name: "TC", width: "7%", className: 'align-middle text-center', searchable: false,orderable: false, },
                    { data: "Biasa", name: "Biasa", width: "7%", className: 'align-middle text-center', searchable: false,orderable: false, },
                    { data: "Lebar", name: "Lebar", width: "7%", className: 'align-middle text-center', searchable: false,orderable: false, },
                    { data: "actions", name: "actions", orderable: false, searchable: false, width: "5%" },
                ],
                order: [[0, "desc"]],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });

            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var nama_supplier = form.data("nama_supplier");

                Swal.fire({
                    title: "Apakah Anda Yakin Menghapus Supplier " + nama_supplier + "?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Ya, hapus!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.editg-btn').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('Gkains.edit', ['Gkain' => ':id']) }}".replace(':id', id),
                    method: 'GET',
                    success: function(response) {
                        $('#editgambar .modal-content').html(response);
                    }
                });
            });
        });
    </script>
@endpush


