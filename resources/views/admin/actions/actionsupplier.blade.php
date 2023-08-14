<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex justify-content-center">
        <a href="#" class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editSupplierModal">
            <i class="bi bi-pencil-square fs-6"></i>
        </a>

        {{-- MODAL EDIT --}}
        <div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editSupplierModalLabel">Edit Supplier</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('layouts.appadmin')
                        <div class="card-body">
                            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- CSRF token -->
                                @method('PUT') <!-- Using the PUT method for updating -->

                                <div class="form-group">
                                    <label for="nama_supplier" class="fw-bold">Nama Supplier</label>
                                    <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                                    @error('nama_supplier')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="fw-bold">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $supplier->alamat) }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="HGT" class="fw-bold">HGT</label>
                                            <input type="number" class="form-control @error('HGT') is-invalid @enderror" id="HGT" name="HGT" value="{{ old('HGT', $supplier->HGT) }}" required>
                                            @error('HGT')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="INT" class="fw-bold">INT</label>
                                            <input type="number" class="form-control @error('INT') is-invalid @enderror" id="INT" name="INT" value="{{ old('INT', $supplier->INT) }}" required>
                                            @error('INT')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Febri" class="fw-bold">Febri</label>
                                            <input type="number" class="form-control @error('Febri') is-invalid @enderror" id="Febri" name="Febri" value="{{ old('Febri', $supplier->Febri) }}" required>
                                            @error('Febri')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="TC" class="fw-bold">TC</label>
                                            <input type="number" class="form-control @error('TC') is-invalid @enderror" id="TC" name="TC" value="{{ old('TC', $supplier->TC) }}" required>
                                            @error('TC')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Biasa" class="fw-bold">Biasa</label>
                                            <input type="number" class="form-control @error('Biasa') is-invalid @enderror" id="Biasa" name="Biasa" value="{{ old('Biasa', $supplier->Biasa) }}" required>
                                            @error('Biasa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Lebar" class="fw-bold">Lebar</label>
                                            <input type="number" class="form-control @error('Lebar') is-invalid @enderror" id="Lebar" name="Lebar" value="{{ old('Lebar', $supplier->Lebar) }}" required>
                                            @error('Lebar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-3"></div>
                                    <div class="col-3 text-center d-grid">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                    <div class="col-3 text-center d-grid">
                                        <a href="" class="btn btn-danger me-1" data-bs-dismiss="modal" aria-label="Close">
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
        {{-- MODAL EDIT --}}



        <div>
            <form action="{{ route('suppliers.destroy', ['supplier' => $supplier->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger" >
                    <i class="bi bi-trash-fill fs-6 "></i>
                </button>
            </form>
        </div>
    </div>
</body>
</html>

