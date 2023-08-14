@include('layouts.appadmin')

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-6">
            <div class="card border-dark">
                <div class="card-body">
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Token CSRF -->
                        @method('PUT') <!-- Menggunakan metode PUT untuk pembaruan -->

                        <h3 class="text-center">
                            Edit Supplier
                        </h3>
                        <hr>

                        <div class="form-group mt-3">
                            <label for="nama_supplier" class="fw-bold">Nama Supplier</label>
                            <input type="text" class="form-control border-dark @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                            @error('nama_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="alamat" class="fw-bold">Alamat</label>
                            <textarea class="form-control border-dark @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $supplier->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="HGT" class="fw-bold">HGT</label>
                                    <input type="number" class="form-control border-dark @error('HGT') is-invalid @enderror" id="HGT" name="HGT" value="{{ old('HGT', $supplier->HGT) }}" required>
                                    @error('HGT')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="INT" class="fw-bold">INT</label>
                                    <input type="number" class="form-control border-dark @error('INT') is-invalid @enderror" id="INT" name="INT" value="{{ old('INT', $supplier->INT) }}" required>
                                    @error('INT')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="Febri" class="fw-bold">Febri</label>
                                    <input type="number" class="form-control border-dark @error('Febri') is-invalid @enderror" id="Febri" name="Febri" value="{{ old('Febri', $supplier->Febri) }}" required>
                                    @error('Febri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="TC" class="fw-bold">TC</label>
                                    <input type="number" class="form-control border-dark @error('TC') is-invalid @enderror" id="TC" name="TC" value="{{ old('TC', $supplier->TC) }}" required>
                                    @error('TC')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="Biasa" class="fw-bold">Biasa</label>
                                    <input type="number" class="form-control border-dark @error('Biasa') is-invalid @enderror" id="Biasa" name="Biasa" value="{{ old('Biasa', $supplier->Biasa) }}" required>
                                    @error('Biasa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="Lebar" class="fw-bold">Lebar</label>
                                    <input type="number" class="form-control border-dark @error('Lebar') is-invalid @enderror" id="Lebar" name="Lebar" value="{{ old('Lebar', $supplier->Lebar) }}" required>
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
                                <a href="{{ route('suppliers.index') }}" class="btn btn-danger me-1">Batal</a>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
