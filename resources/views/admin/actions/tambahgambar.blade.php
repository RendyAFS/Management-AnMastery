@include('layouts.appadmin')

<form action="{{ route('Gkains.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF token -->

    <div class="form-group mt-3">
        <label for="gambar_kain" class="fw-bold">Nama Gambar:</label>
        <input type="text" class="form-control border-dark" id="gambar_kain" name="gambar_kain" value="{{ old('gambar_kain') }}" required>
    </div>
    <div class="form-group mt-3">
        <label for="pic" class="fw-bold">Foto Gambar:</label>
        <input type="file" class="form-control border-dark" id="pic" name="pic" value="{{ old('pic') }}" required>
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
