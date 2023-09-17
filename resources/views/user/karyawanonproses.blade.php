@extends('layouts.appuser')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbaruser')
        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row d-flex justify-content-center mt-4">
                <div class="col-lg-10 " >
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
