@include('layouts.appadmin')

<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addSupplierModalLabel">Tambah Supplier</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- CSRF token -->

                    <div class="form-group mt-3">
                        <label for="nama_supplier" class="fw-bold">Nama Supplier</label>
                        <input type="text" class="form-control border-dark" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}" required>
                        @error('nama_supplier')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="alamat" class="fw-bold">Alamat</label>
                        <textarea class="form-control border-dark" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="HGT" class="fw-bold">HGT</label>
                                <input type="number" class="form-control border-dark" id="HGT" name="HGT" value="{{ old('HGT', 0) }}" required>
                                @error('HGT')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="INT" class="fw-bold">INT</label>
                                <input type="number" class="form-control border-dark" id="INT" name="INT" value="{{ old('INT', 0) }}" required>
                                @error('INT')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="Febri" class="fw-bold">Febri</label>
                                <input type="number" class="form-control border-dark" id="Febri" name="Febri" value="{{ old('Febri', 0) }}" required>
                                @error('Febri')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="TC" class="fw-bold">TC</label>
                                <input type="number" class="form-control border-dark" id="TC" name="TC" value="{{ old('TC', 0) }}" required>
                                @error('TC')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="Biasa" class="fw-bold">Biasa</label>
                                <input type="number" class="form-control border-dark" id="Biasa" name="Biasa" value="{{ old('Biasa', 0) }}" required>
                                @error('Biasa')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="Lebar" class="fw-bold">Lebar</label>
                                <input type="number" class="form-control border-dark" id="Lebar" name="Lebar" value="{{ old('Lebar', 0) }}" required>
                                @error('Lebar')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3"></div>
                        <div class="col-3 d-grid">
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>
                        <div class="col-3 d-grid">
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
