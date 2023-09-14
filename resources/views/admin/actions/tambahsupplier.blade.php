@include('layouts.appadmin')

<form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF token -->

    <div class="form-group mt-3">
        <label for="nama_supplier" class="fw-bold">Nama Supplier:</label>
        <input type="text" class="form-control border-dark" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}" required>
    </div>

    <div class="form-group mt-3">
        <label for="alamat" class="fw-bold">Alamat:</label>
        <textarea class="form-control border-dark" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="HGT" class="fw-bold">HGT:</label>
                <input type="number" class="form-control border-dark" id="HGT" name="HGT" value="{{ old('HGT', 0) }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="INT" class="fw-bold">INT:</label>
                <input type="number" class="form-control border-dark" id="INT" name="INT" value="{{ old('INT', 0) }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="Febri" class="fw-bold">Febri:</label>
                <input type="number" class="form-control border-dark" id="Febri" name="Febri" value="{{ old('Febri', 0) }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="TC" class="fw-bold">TC:</label>
                <input type="number" class="form-control border-dark" id="TC" name="TC" value="{{ old('TC', 0) }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="Biasa" class="fw-bold">Biasa:</label>
                <input type="number" class="form-control border-dark" id="Biasa" name="Biasa" value="{{ old('Biasa', 0) }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="Lebar" class="fw-bold">Lebar:</label>
                <input type="number" class="form-control border-dark" id="Lebar" name="Lebar" value="{{ old('Lebar', 0) }}" required>
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
