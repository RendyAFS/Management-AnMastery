<div class="modal-header">
    <h3 class="modal-title">Edit Supplier</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<div class="modal-body">
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="nama_supplier" class="fw-bold">Nama Supplier</label>
            <input type="text" class="form-control border-dark @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="alamat" class="fw-bold">Alamat</label>
            <textarea class="form-control border-dark @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $supplier->alamat) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="HGT" class="fw-bold">HGT</label>
                    <input type="number" class="form-control border-dark @error('HGT') is-invalid @enderror" id="HGT" name="HGT" value="{{ old('HGT', $supplier->HGT) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="INT" class="fw-bold">INT</label>
                    <input type="number" class="form-control border-dark @error('INT') is-invalid @enderror" id="INT" name="INT" value="{{ old('INT', $supplier->INT) }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="Febri" class="fw-bold">Febri</label>
                    <input type="number" class="form-control border-dark @error('Febri') is-invalid @enderror" id="Febri" name="Febri" value="{{ old('Febri', $supplier->Febri) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="TC" class="fw-bold">TC</label>
                    <input type="number" class="form-control border-dark @error('TC') is-invalid @enderror" id="TC" name="TC" value="{{ old('TC', $supplier->TC) }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="Biasa" class="fw-bold">Biasa</label>
                    <input type="number" class="form-control border-dark @error('Biasa') is-invalid @enderror" id="Biasa" name="Biasa" value="{{ old('Biasa', $supplier->Biasa) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="Lebar" class="fw-bold">Lebar</label>
                    <input type="number" class="form-control border-dark @error('Lebar') is-invalid @enderror" id="Lebar" name="Lebar" value="{{ old('Lebar', $supplier->Lebar) }}" required>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-3 text-center d-grid">
                <button type="submit" class="btn btn-primary shadow">Edit</button>
            </div>
            <div class="col-3 text-center d-grid">
                <a href="" class="btn btn-danger me-1 shadow" data-bs-dismiss="modal" aria-label="Close">Batal</a>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
</div>
