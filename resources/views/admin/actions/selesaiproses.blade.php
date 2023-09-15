@extends('layouts.appadmin')
{{-- style="border: 1px black solid" --}}



@section('content')
<style>
    /* Gaya umum untuk tabel */
    #fabricTable {
        width: 100%;
        border-collapse: collapse;
        margin: 1em 0;
        border: solid 2px rgba(128, 128, 128, 0.1);

    }

    #fabricTable th,
    #fabricTable td {
        padding: 8px 10px;
        text-align: left;
        border: solid 1px rgba(128, 128, 128, 0.1);

    }

    /* Gaya untuk baris header */
    #fabricTable thead tr {
        background-color: #f2f2f2;
    }

    /* Gaya untuk baris data */
    #fabricTable tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    #tablecontainer{
        border: solid 2px rgba(128, 128, 128, 0.1);
        border-radius: 5px;
        padding: 10px
    }


    .animated {
        animation: zoomOut 0.35s ease-in-out;
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
<div class="container ">
    <div class="row mt-4 ">
        <div class="col-lg-3">
            <h2>
                List Proses Selesai
            </h2>
        </div>
        <div class="col-lg-9 d-flex justify-content-end">
            <a href="{{route('restoreall')}}"  class="btn btn-success me-2 d-flex align-items-center" >
                <i class="bi bi-arrow-counterclockwise me-2"></i> Belum Selesai Semua
            </a>

            <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#hapus">
                <i class="bi bi-trash3-fill me-2"></i> Hapus Semua
            </button>

            <a href="{{route('onproses.index')}}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-arrow-return-left me-2"></i> Kembali
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
                                Apakah Anda Yakin <br>
                                Menghapus Semua Proses?
                            </h4>
                        </div>
                        <hr>
                        {{-- button --}}
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <a href="{{route('clearselesai')}}" class="btn btn-danger me-2">
                                        Ya, Hapus!
                                    </a>
                                    <button type="button" class="btn btn-success ms-2" data-bs-dismiss="modal">Batalkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 animatedC  ">
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
                            <th>
                                Opsi
                            </th>
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
                    orderable: true, // Menonaktifkan pengurutan
                    searchable:false,

                },
                {
                    targets: 2, // Kolom dengan indeks 2
                    orderable: true, // Aktifkan pengurutan
                    searchable:false,

                },
                {
                    targets: 3, // Kolom dengan indeks 3
                    orderable: true, // Menonaktifkan pengurutan
                    searchable:false,

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
