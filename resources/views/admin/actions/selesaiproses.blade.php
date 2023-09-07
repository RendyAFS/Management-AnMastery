@extends('layouts.appadmin')
{{-- style="border: 1px black solid" --}}

<style>
    /* Gaya umum untuk tabel */
    #fabricTable {
        width: 100%;
        border-collapse: collapse;
        margin: 1em 0;
    }

    #fabricTable th,
    #fabricTable td {
        padding: 8px 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Gaya untuk baris header */
    #fabricTable thead tr {
        background-color: #f2f2f2;
    }

    /* Gaya untuk baris data */
    #fabricTable tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    /* Gaya untuk tombol edit dan selesai */
    .action-buttons {
        display: flex;
        justify-content: space-between;
    }

    .action-buttons a {
        margin-right: 10px;
    }
    #tablecontainer{
        border: solid 2px rgb(91, 91, 91);
        border-radius: 5px;
        padding: 10px
    }


    .animated {
        animation: zoomOut 0.5s ease-in-out;
    }

    @keyframes zoomOut {
        0% {
            opacity: 0;
            transform: scale(1.5);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

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



@section('content')
<div class="container animatedC">
    <div class="row mt-4">
        <div class="col-lg-8">
            <h2>
                List Proses Selesai
            </h2>
        </div>
        <div class="col-lg-4">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#hapus">
                    Hapus Semua <i class="bi bi-trash3-fill ms-2"></i>
                </button>
                <a href="{{route('onproses.index')}}" class="btn btn-primary">
                    Kembali <i class="bi bi-arrow-return-left ms-2"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="hapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-3" id="hapusLabel">Peringatan !!!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#F68731" class="bi bi-exclamation-circle animated" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>
                                </div>
                                <h4 class="text-center mt-3">
                                    Apakah Anda Yakin Menghapus Semua Proses
                                </h4>
                            </div>
                            <div class="modal-footer">
                                <a href="{{route('clearselesai')}}" class="btn btn-danger">
                                    Hapus Semua Proses
                                </a>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-start" id="tablecontainer">
                <table id="fabricTable" class="display">
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Nama Supplier</th>
                            <th>Jenis Kain</th>
                            <th>Jenis Warna</th>
                            <th>Gambar Kain</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fabrics as $fabric)
                            @php
                                $jenisWarna = $fabric->typecolor->jenis_warna;
                                $bgClass = '';

                                switch ($jenisWarna) {
                                    case '1 Warna':
                                        $bgClass = 'bg-danger';
                                        break;
                                    case '2 Warna':
                                        $bgClass = 'bg-success';
                                        break;
                                    case '3 Warna':
                                        $bgClass = 'bg-primary';
                                        break;
                                    // Tambahkan pengkondisian lain jika diperlukan
                                }
                            @endphp
                            <tr>
                                <td>{{ $fabric->employee->nama_karyawan }}</td>
                                <td>{{ $fabric->supplier->nama_supplier }}</td>
                                <td>{{ $fabric->typefabric->jenis_kain }}</td>
                                <td>{{ $fabric->typecolor->jenis_warna }}</td>
                                <td>{{ $fabric->picturefabric->gambar_kain }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('restore', ['id' => $fabric->id]) }}"
                                            class="btn btn-warning me-2 fw-bold" >Belum Selesai
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#fabricTable').DataTable({
            columnDefs: [
                {
                    targets: 0, // Kolom "Nama Karyawan" berada di indeks 0
                    orderable: true, // Aktifkan pengurutan
                },
                {
                    targets: 1, // Kolom dengan indeks 1
                    orderable: false, // Menonaktifkan pengurutan
                },
                {
                    targets: 2, // Kolom dengan indeks 2
                    orderable: true, // Aktifkan pengurutan
                },
                {
                    targets: 3, // Kolom dengan indeks 3
                    orderable: false, // Menonaktifkan pengurutan
                },
                {
                    targets: 4, // Kolom dengan indeks 4
                    orderable: true, // Aktifkan pengurutan
                },
                {
                    targets: 5, // Kolom dengan indeks 5
                    orderable: false, // Menonaktifkan pengurutan
                    searchable:false,
                },
            ],
            order: [[0, 'asc']], // Pengurutan awal pada kolom "Nama Karyawan" secara ascending
        });
    });
</script>


@endsection
