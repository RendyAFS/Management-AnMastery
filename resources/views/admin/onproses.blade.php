@extends('layouts.appadmin')
{{-- style="border: 1px black solid" --}}


@section('content')
<style>
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

    #btn-selesaisemua{
        padding: 6px
        display: flex; /* Menggunakan Flexbox */
        align-items: center; /* Menyelaraskan vertikal ke tengah */
        justify-content: center; /* Menyelaraskan horizontal ke tengah */
    }
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
                    <div class="bg-judul p-2" style="width: 55%">
                        <h1 class="ms-2">Tabel OnProses</h1>
                    </div>
                </div>


                <div class="col-xl-6 col-lg-6 col-md-12" >
                    <div class="d-flex justify-content-end">

                        <a href="SelesaiSemua" class="btn btn-warning d-flex align-items-center me-3 shadow" data-bs-toggle="modal" data-bs-target="#selesaiSemua">
                            <i class="bi bi-list-check align-middle fs-4 me-2"></i> Selesai Semua
                        </a>
                        <a href="{{route('selesai')}}" class="btn btn-success me-3 d-flex align-items-center shadow">
                            <i class="bi bi-list-check align-middle fs-4 me-2"></i> Daftar Selesai
                        </a>
                        <a href="TambahProses" class="btn btn-primary d-flex align-items-center shadow" data-bs-toggle="modal" data-bs-target="#addProsesModal">
                            <i class="bi bi-file-earmark-plus align-middle fs-4 me-2"></i> Tambah Proses
                        </a>

                    </div>
                    {{-- Modal selesaiSemua --}}
                    <div class="modal fade" id="selesaiSemua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="selesaiSemuaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-3" id="selesaiSemuaLabel">Peringatan !!!</h1>
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
                                        Proses Selesai Semua?
                                    </h4>
                                </div>
                                <hr>
                                {{-- button --}}
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ route('selesaisemua') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger d-flex align-middle me-2 shadow" >
                                                    <i class="bi bi-clipboard-check me-2"></i> Ya,Selesai!
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-success shadow" data-bs-dismiss="modal">Batalkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            </div><hr>

            <div class="row mt-4">
                <div class="col-lg-4" >
                    <div class="card shadow">
                        <div class="card-header" id="th">
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-center" >
                        @if (count($fabrics) === 0)
                        <div class="text-center" style="height: 85vh; display: flex; justify-content: center; align-items: center; opacity:0.2;">
                            <h1><i class="bi bi-list-task"></i> Belum ada proses</h1>
                        </div>
                        @else
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
                                <div class="card text-white {{$bgClass}} mb-3 me-3 shadow border border-1 border-dark " id="anmimasi-card" style="max-width: 15rem;">
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
                                                <a href="{{ route('onproses.edit', ['onprose' => $fabric->id]) }}" class="text-decoration-none btn btn-light me-2 shadow">Edit</a>
                                                <form action="{{ route('onproses.destroy', ['onprose' => $fabric->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-light shadow">
                                                        Selesai
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
