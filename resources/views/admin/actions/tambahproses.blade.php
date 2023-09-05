@include('layouts.appadmin')
<style>
    label{
        font-weight: bold;
    }
</style>
<form action="{{ route('onproses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF token -->
    <div class="row">
        <div class="col">

            <div class="form-group mt-3">
                <label for="nama_supplier">Nama Supplier:</label>
                <select name="nama_supplier" id="nama_supplier" class="form-select" required>
                    <option value="" ></option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                    @endforeach
                </select>
                @error('nama_supplier')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="nama_karyawan">Nama Karyawan:</label>
                <select name="nama_karyawan" id="nama_karyawan" class="form-select" required>
                    <option value=""></option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nama_karyawan }}</option>
                    @endforeach
                </select>
                @error('nama_karyawan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="type_fabric">Jenis Kain:</label>
                <select name="type_fabric" id="type_fabric" class="form-select" required>
                    <option value=""></option>
                    @foreach ($typefabrics as $typefabric)
                        <option value="{{ $typefabric->id }}">{{ $typefabric->jenis_kain }}</option>
                    @endforeach
                </select>
                @error('type_fabric')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="type_color">Jenis Warna:</label>
                <select name="type_color" id="type_color" class="form-select" required>
                    <option value=""></option>
                    @foreach ($typecolors as $typecolor)
                        <option value="{{ $typecolor->id }}">{{ $typecolor->jenis_warna }}</option>
                    @endforeach
                </select>
                @error('type_color')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="picture_fabric">Gambar:</label>
                <select name="picture_fabric" id="picture_fabric" class="form-select" required>
                    <option value=""></option>
                    @foreach ($picturefabrics as $picturefabric)
                        <option value="{{ $picturefabric->id }}">{{ $picturefabric->gambar_kain }}</option>
                    @endforeach
                </select>
                @error('picture_fabric')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>




            {{-- Button --}}
            <div class="row mt-4">
                <div class="col-3"></div>
                <div class="col-3 d-grid">
                    <button type="submit" class="btn btn-primary ">Tambah</button>
                </div>
                <div class="col-3 d-grid">
                    <a href="" class="btn btn-danger me-1" data-bs-dismiss="modal" aria-label="Close" >
                        Batal
                    </a>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</form>


