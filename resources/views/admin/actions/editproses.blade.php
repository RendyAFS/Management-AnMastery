@extends('layouts.appadmin')

@section('content')
<style>
    .animatedC {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>
<div class="container animatedC">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="card shadow w-50 mt-5">
                <h3 class="card-header">Edit Proses</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('onproses.update', ['onprose' => $fabric->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-3">
                            <label for="nama_supplier">Nama Supplier:</label>
                            <select name="nama_supplier" id="nama_supplier" class="form-select" required>
                                <option value=""></option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $supplier->id == $selectedSupplierId ? 'selected' : '' }}>
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="nama_karyawan">Nama Karyawan:</label>
                            <select name="nama_karyawan" id="nama_karyawan" class="form-select" required>
                                <option value=""></option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ $employee->id == $selectedEmployeeId ? 'selected' : '' }}>
                                        {{ $employee->nama_karyawan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="type_fabric">Jenis Kain:</label>
                            <select name="type_fabric" id="type_fabric" class="form-select" required>
                                <option value=""></option>
                                @foreach ($typefabrics as $typefabric)
                                    <option value="{{ $typefabric->id }}" {{ $typefabric->id == $selectedTypeFabricId ? 'selected' : '' }}>
                                        {{ $typefabric->jenis_kain }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="type_color">Jenis Warna:</label>
                            <select name="type_color" id="type_color" class="form-select" required>
                                <option value=""></option>
                                @foreach ($typecolors as $typecolor)
                                    <option value="{{ $typecolor->id }}" {{ $typecolor->id == $selectedTypeColorId ? 'selected' : '' }}>
                                        {{ $typecolor->jenis_warna }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="picture_fabric">Gambar:</label>
                            <select name="picture_fabric" id="picture_fabric" class="form-select" required>
                                <option value=""></option>
                                @foreach ($picturefabrics as $picturefabric)
                                    <option value="{{ $picturefabric->id }}" {{ $picturefabric->id == $selectedPictureFabricId ? 'selected' : '' }}>
                                        {{ $picturefabric->gambar_kain }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mt-4 d-flex justify-content-center">
                            <div class="col-lg-4 d-grid">
                                <button type="submit" class="btn btn-primary mx-2 shadow">Edit</button>
                            </div>
                            <div class="col-lg-4 d-grid">
                                <a href="{{route('onproses.index')}}" class="btn btn-danger shadow">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
