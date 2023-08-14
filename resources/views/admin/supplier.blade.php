@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark position-fixed" style="height: 100vh; overflow-y: auto;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Main Menu</span>
                </a>
                {{-- NAV ITEM --}}
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link align-middle px-0">
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
                                <a href="{{ route('absensi') }}" class="nav-link px-0 ps-2">
                                    <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right"></i> </span> Absensi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('onproses') }}" class="nav-link px-0 ps-2">
                                    <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right"></i> </span> Onproses
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gaji') }}" class="nav-link px-0 ps-2">
                                    <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right"></i> </span> Gaji
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('income') }}" class="nav-link px-0 align-middle">
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
                <div class="col-10">
                    <h1>
                        Tabel Supplier
                    </h1>
                </div>
                <div class="col-2">
                    {{-- <a href="{{route('createsupplier')}}" class="btn btn-primary">Tambah Supplier <i class="bi bi-plus-circle align-middle fs-4"></i></a> --}}
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                        Tambah Supplier <i class="bi bi-plus-circle align-middle fs-4"></i>
                    </a>

                    <!-- Modal Tambah Supplier -->
                    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="addSupplierModalLabel">Tambah Supplier</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf <!-- CSRF token -->

                                        <div class="form-group">
                                            <label for="nama_supplier">Nama Supplier</label>
                                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}" required>
                                            @error('nama_supplier')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="HGT">HGT</label>
                                                    <input type="number" class="form-control" id="HGT" name="HGT" value="{{ old('HGT', 0) }}" required>
                                                    @error('HGT')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="INT">INT</label>
                                                    <input type="number" class="form-control" id="INT" name="INT" value="{{ old('INT', 0) }}" required>
                                                    @error('INT')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Febri">Febri</label>
                                                    <input type="number" class="form-control" id="Febri" name="Febri" value="{{ old('Febri', 0) }}" required>
                                                    @error('Febri')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="TC">TC</label>
                                                    <input type="number" class="form-control" id="TC" name="TC" value="{{ old('TC', 0) }}" required>
                                                    @error('TC')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Biasa">Biasa</label>
                                                    <input type="number" class="form-control" id="Biasa" name="Biasa" value="{{ old('Biasa', 0) }}" required>
                                                    @error('Biasa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Lebar">Lebar</label>
                                                    <input type="number" class="form-control" id="Lebar" name="Lebar" value="{{ old('Lebar', 0) }}" required>
                                                    @error('Lebar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-3"></div>
                                            <div class="col-3 d-grid">
                                                <button type="submit" class="btn btn-primary ">Tambah</button>
                                            </div>
                                            <div class="col-3 d-grid">
                                                <a href="" class="btn btn-danger me-1" data-bs-dismiss="modal" aria-label="Close">
                                                    Batal
                                                </a>
                                            </div>
                                            <div class="col-3"></div>
                                        </div>

                                    </form>
                                    {{-- END FORM --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- TABEL --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white "
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
        });
    </script>
@endpush


