@extends('layouts.appadmin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-4 mx-auto"> <!-- Use mx-auto to center the card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="modal-title">Edit Karyawan</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensis.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="form-group mt-3">
                            <label for="nama_karyawan" class="fw-bold">Nama Karyawan</label>
                            <input type="text" class="form-control border-dark" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan', $employee->nama_karyawan) }}" required>
                            @error('nama_karyawan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="umur" class="fw-bold">Umur</label>
                            <input type="number" class="form-control border-dark" id="umur" name="umur" value="{{ old('umur', $employee->umur) }}" required>
                            @error('umur')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="alamat" class="fw-bold">Alamat</label>
                            <textarea class="form-control border-dark" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $employee->alamat) }}</textarea>
                            @error('alamat')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="nohp" class="fw-bold">Nomor HP</label>
                            <input type="number" class="form-control border-dark" id="nohp" name="nohp" value="{{ old('nohp', $employee->nohp) }}" required>
                            @error('nohp')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row mt-4">
                            <div class="col-3"></div>
                            <div class="col-3 d-grid">
                                <button type="submit" class="btn btn-primary ">Edit</button>
                            </div>
                            <div class="col-3 d-grid">
                                <a href="{{route('absensis.index')}}" class="btn btn-danger me-1">
                                    Batal
                                </a>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
