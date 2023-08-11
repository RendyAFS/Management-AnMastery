@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark position-fixed" style="height: 100vh; overflow-y: auto;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Main Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-house-fill"></i> <span class="ms-1 d-none d-sm-inline"></span>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('supplier') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-dropbox"></i> <span class="ms-1 d-none d-sm-inline"></span>Supplier
                        </a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
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

                    <li>
                        <a href="{{ route('income') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-cash-coin"></i> <span class="ms-1 d-none d-sm-inline"></span>Incomes</a>
                    </li>
                </ul>
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

                    <!-- Modal -->
                    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addSupplierModalLabel">Tambah Supplier</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('storesupplier') }}" method="POST" enctype="multipart/form-data">
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

                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                        <div class="table-responsive border p-3 rounded-3">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white ">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Supplier</th>
                                        <th>Jumlah Kain</th>
                                        <th>HGT</th>
                                        <th>INT</th>
                                        <th>Febri</th>
                                        <th>TC</th>
                                        <th>Biasa</th>
                                        <th>Lebar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- melakukan perulangan (looping) untuk setiap elemen dalam$employees, dimana setiap elemen tersebut akan disimpan dalam variabel $employee. --}}
                                    @foreach ($suppliers as $supplier)
                                        {{-- Calculate total kain quantity --}}
                                        @php
                                            $totalKain = $supplier->HGT + $supplier->INT + $supplier->Febri +
                                                        $supplier->TC + $supplier->Biasa + $supplier->Lebar;
                                        @endphp

                                        {{-- Display data for each supplier --}}
                                        <tr>
                                            <td class="text-center" style="width: 5%">{{ $supplier->id }}.</td>
                                            <td>{{ $supplier->nama_supplier }}</td>
                                            <td class="text-center">{{ $totalKain }}</td>
                                            <td class="text-center" style="width: 8%">{{ $supplier->HGT }}</td>
                                            <td class="text-center" style="width: 8%">{{ $supplier->INT }}</td>
                                            <td class="text-center" style="width: 8%">{{ $supplier->Febri }}</td>
                                            <td class="text-center" style="width: 8%">{{ $supplier->TC }}</td>
                                            <td class="text-center" style="width: 8%">{{ $supplier->Biasa }}</td>
                                            <td class="text-center" style="width: 8%">{{ $supplier->Lebar }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
