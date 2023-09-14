@include('layouts.appadmin')

<div class="modal-header">
    <h1 class="modal-title fs-5" id="eidtgambarLabel">Modal title</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('Gkains.update', ['Gkain' => $pic->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF token -->
        @method('PUT')
        <div class="form-group mt-3">
            <label for="gambar_kain" class="fw-bold">Nama Gambar:</label>
            <input type="text" class="form-control border-dark" id="gambar_kain" name="gambar_kain"  value="{{ old('gambar_kain', $pic->gambar_kain) }}" required>
        </div>


        {{-- {{ old('HGT', $pic->pic) }} --}}
        <div class="form-group mt-3">
            <label for="pic" class="fw-bold">Foto Gambar:</label>
            <input type="file" class="form-control border-dark" id="pic" name="pic" value="{{ old('pic', $pic->pic) }}">
        </div>


        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-3 d-grid">
                <button type="submit" class="btn btn-primary ">Edit</button>
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



