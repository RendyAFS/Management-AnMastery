@extends('layouts.appadmin')
{{-- style="border: 1px black solid" --}}

{{-- <style>
    @keyframes zoomIn {
    from {
            transform: scale(0);
            opacity: 0;
        }
    to {
            transform: scale(1);
            opacity: 1;
        }
    }

    #anmimasi-card {
        animation-name: zoomIn;
        animation-duration: 0.5s; /* Ubah durasi sesuai kebutuhan */
        animation-timing-function: ease;
        animation-fill-mode: forwards;
    }

</style> --}}
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
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <h1>
                        Tabel On Proses
                    </h1>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-12" >
                    <div class="d-flex justify-content-end">
                        <a href="{{route('selesai')}}" class="btn btn-success me-3">
                            Selesai <i class="bi bi-clipboard-check align-middle fs-4 ms-2"></i>
                        </a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProsesModal">
                            Tambah Proses <i class="bi bi-plus-circle align-middle fs-4 ms-2"></i>
                        </a>

                    </div>


                    <!-- Modal Tambah Supplier -->
                    <div class="modal fade" id="addProsesModal" tabindex="-1" aria-labelledby="addProsesModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="addProsesModalLabel">Tambah Proses</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('admin.actions.tambahproses')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="modal-title">Sisa Kain</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($suppliers as $supplier)
                            <div class="row">
                                <div class="col-5">
                                    <p class="fw-bold">
                                        <i class="bi bi-person-fill"></i> {{ $supplier->nama_supplier }}
                                    </p>
                                </div>
                                <div class="col-7">
                                    <p>Sisa Kain: <b>{{ $supplier->jumlah_kain }}</b> Seri</p>

                                </div> <hr>
                                <div class="none">
                                    {{-- <div class="col">
                                        {{ $supplier->HGT }}
                                    </div>
                                    <div class="col">
                                        {{ $supplier->INT }}
                                    </div>
                                    <div class="col">
                                        {{ $supplier->Febri }}
                                    </div>
                                    <div class="col">
                                        {{ $supplier->TC }}
                                    </div>
                                    <div class="col">
                                        {{ $supplier->Lebar }}
                                    </div>
                                    <div class="col">
                                        {{ $supplier->Biasa }}
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-center">
                        @foreach ($fabrics as $fabric)
                            @php
                                $jenisWarna = $fabric->typecolor->jenis_warna;
                                $bgClass = '';

                                switch ($jenisWarna) {
                                    case '1 Warna':
                                        $bgClass = 'bg-danger';
                                        break;
                                    case '2 Warna':
                                        $bgClass = 'bg-success';
                                        break;
                                    case '3 Warna':
                                        $bgClass = 'bg-primary';
                                        break;
                                    // Tambahkan pengkondisian lain jika diperlukan
                                }
                            @endphp
                            <div class="card text-white {{$bgClass}} mb-3 me-3 border" id="anmimasi-card" style="max-width: 15rem;">
                                <div class="card-header">
                                    <h4>
                                        <i class="bi bi-person-fill"></i> {{$fabric->employee->nama_karyawan}}
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-layers-fill"></i> {{$fabric->supplier->nama_supplier}}
                                    </h5>

                                    <p class="card-text">
                                        <i class="bi bi-dot"></i>{{$fabric->typefabric->jenis_kain}}<br>
                                        <i class="bi bi-dot"></i>{{$fabric->typecolor->jenis_warna}} <br>
                                        <i class="bi bi-dot"></i>{{$fabric->picturefabric->gambar_kain}}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="row ">
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <a href="{{ route('onproses.edit', ['onprose' => $fabric->id]) }}" class="text-decoration-none btn btn-light me-2">Edit</a>
                                            <form action="{{ route('onproses.destroy', ['onprose' => $fabric->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-light">
                                                    Selesai
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
