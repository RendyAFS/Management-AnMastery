@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbar1')

        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row mt-3">
                <h1 class="mb-4">Dashboard</h1>
                <div class="col-lg-4">
                    {{-- SUPPLIER --}}
                    <div class="card shadow" >
                        <h5 class="card-header">Jumlah Kain</h5>
                        <div class="card-body" style="max-height: 340px;  height: 340px; overflow-y:auto">
                            <div class="p-6 m-20 bg-white rounded shadow">
                                {!! $chartkain->container() !!}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="{{route('suppliers.index')}}" class="btn btn-primary shadow">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Gambar Kain --}}
                <div class="col-lg-4">
                    <div class="card shadow" >
                        <h5 class="card-header">Gambar Kain</h5>
                        <div class="card-body" style="max-height: 340px;  height: 340px; overflow-y:auto">
                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($pics as $index => $pic)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="d-flex justify-content-center align-items-center mt-4">
                                                <img src="{{ asset('storage/gambar_kain/' . $pic->pic) }}" alt="{{$pic->gambar_kain}}" style="height: 215px">
                                            </div>
                                            <p class="fw-bold fs-5 mt-3">{{$pic->gambar_kain}}</p>
                                        </div>
                                    @endforeach
                                </div>
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
                        <h5 class="card-header">Karyawan</h5>
                        <div class="card-body" style="max-height: 340px; overflow-y: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Karyawan</th>
                                        <th>Total Absensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->nama_karyawan }}</td>
                                            <td>{{ $employee->total_absensi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('absensis.index')}}" class="btn btn-primary shadow">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7">
                    <div class="card shadow">
                        <h5 class="card-header">Incomes</h5>
                        <div class="card-body">
                            <div class="p-6 m-20 bg-white rounded shadow">
                                {!! $chartincome->container() !!}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('incomes.index')}}" class="btn btn-primary shadow">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card shadow">
                        <h5 class="card-header">OnProses</h5>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                footer
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
