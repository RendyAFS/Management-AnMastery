@extends('layouts.appadmin')

@section('content')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('layouts.navbar1')

            <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
                <div class="row">
                    <h1 class="mb-4">Dashboard</h1>
                    <div class="col-lg-4">
                        {{-- SUPPLIER --}}
                        <div class="card shadow">
                            <h4 class="card-header">Jumlah Kain</h4>
                            <div class="card-body" style="max-height: 340px;  height: 340px; overflow-y:auto">
                                <div class="p-6 m-20 bg-white rounded shadow" style="max-height: 300px;height: 300px">
                                    {!! $chartkain->container() !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('suppliers.index') }}" class="btn btn-primary shadow">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Gambar Kain --}}
                    <div class="col-lg-4">
                        <div class="card shadow">
                            <h4 class="card-header">Gambar Kain</h4>
                            <div class="card-body" style="max-height: 340px;  height: 340px; overflow-y:auto">
                                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($pics as $index => $pic)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <div class="d-flex justify-content-center align-items-center mt-4">
                                                    <img src="{{ asset('storage/gambar_kain/' . $pic->pic) }}"
                                                        alt="{{ $pic->gambar_kain }}" style="height: 215px">
                                                </div>
                                                <p class="fw-bold fs-5 mt-3">{{ $pic->gambar_kain }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleAutoplaying" role="button"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleAutoplaying" role="button"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex justify-content-end">
                                        <a href="/admin/suppliers#gambar_kain2" class="btn btn-primary shadow">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Karyawan --}}
                    <div class="col-lg-4">
                        <div class="card shadow">
                            <h4 class="card-header">Absensi Karyawan</h4>
                            <div class="card-body" style="max-height: 340px; overflow-y: auto;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Karyawan</th>
                                            <th class="text-center">Total Absensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td class="text-center">{{ $employee->nama_karyawan }}</td>
                                                <td class="text-center">{{ $employee->total_absensi }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('absensis.index') }}" class="btn btn-primary shadow">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div class="card shadow">
                            <h4 class="card-header">Incomes</h4>
                            <div class="card-body">
                                <div class="p-6 m-20 bg-white rounded shadow">
                                    {!! $chartincome->container() !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('incomes.index') }}" class="btn btn-primary shadow">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card shadow">
                            <h4 class="card-header">OnProses</h4>
                            <div class="card-body" style="max-height: 340px; overflow-y: auto;">
                                @if (count($fabrics) === 0)
                                    <div class="text-center mt-4 mb-3" style="opacity:0.2;">
                                        <h3><i class="bi bi-list-task"></i> Belum ada proses</h3>
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
                                        <div class="card text-white {{ $bgClass }} mb-3 me-3 shadow border border-1 border-dark "
                                            id="anmimasi-card">

                                            <div class="card-body">
                                                <i class="bi bi-list-task me-2"></i>
                                                {{ $fabric->employee->nama_karyawan }} -
                                                {{ $fabric->supplier->nama_supplier }} -
                                                {{ $fabric->typefabric->jenis_kain }} -
                                                {{ $fabric->typecolor->jenis_warna }} -
                                                {{ $fabric->picturefabric->gambar_kain }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('onproses.index') }}" class="btn btn-primary shadow">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
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
    <script src="{{ $chartkain->cdn() }}"></script>
    {{ $chartkain->script() }}

    <script src="{{ $chartincome->cdn() }}"></script>
    {{ $chartincome->script() }}
@endpush
