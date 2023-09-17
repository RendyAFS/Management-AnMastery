@extends('layouts.appadmin')

@section('content')
<style>
    #th{
        background-color: #393E46;
        color: #EEEEEE
    }
</style>
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbar2')

        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            <div class="row">
                <div class="col-xl-10 col-lg-8 col-md-12">
                    <div class="bg-judul p-2" style="width: 30%">
                        <h1 class="ms-2">Tabel Absensi</h1>
                    </div>
                </div>


                <div class="col-xl-2 col-lg-4 col-md-12 " >
                    <div class="d-flex justify-content-end">
                        <a href="TambahKaryawan" class="btn btn-primary d-flex align-items-center shadow" data-bs-toggle="modal" data-bs-target="#addKaryawanModal">
                            <i class="bi bi-person-circle align-middle me-2 fs-4"></i> Tambah Karyawan
                        </a>
                    </div>
                    <div class="modal fade" id="addKaryawanModal" tabindex="-1" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="addKaryawanModalLabel">Tambah Karyawan</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Modal Tambah Supplier -->
                                    @include('admin.actions.tambahkaryawan')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><hr>
                {{-- END FORM --}}

                {{-- TABEL --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive border ps-4 pe-5 pt-3 pb-3 rounded-3 shadow">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable shadow"
                            id="tabelemployee">
                                <thead>
                                    <tr class="text-center">
                                        <th >id</th>
                                        <th class="text-center" id="th">No.</th>
                                        <th class="text-center" id="th">Nama Karyawan</th>
                                        <th>Umur</th>
                                        <th id="th">Total Absensi</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center" id="th">Nomor Hp</th>
                                        <th class="text-center" id="th">Opsi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#tabelemployee").DataTable({
                serverSide: true,
                processing: true,
                ajax: "getemployees",
                columns: [
                    { data: "id", name: "id", visible: false },
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        width: "2%",
                        className: 'align-middle text-center',
                        render: function(data, type, row, meta) {
                            // Mengembalikan nomor indeks dengan titik di depannya
                            return (meta.row + 1) + ".";
                        }
                    },
                    {
                        data: "nama_karyawan",
                        name: "nama_karyawan",
                        className: 'align-middle',
                        searchable: true,
                        render: function(data, type, row, meta) {
                            // Menambahkan "Tahun" setelah data umur
                            return " " + data;
                        }
                    },
                    {
                        data: "umur",
                        name: "umur",
                        className: 'align-middle text-center',
                        visible: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            // Menambahkan "Tahun" setelah data umur
                            return data + ' Tahun';
                        }
                    },
                    { data: "total_absensi", name: "total_absensi", visible: true, orderable: true, className: 'align-middle text-center',},
                    { data: "alamat", name: "alamat", visible: false, orderable: false },
                    { data: "nohp", name: "nohp", visible: true, orderable: false, className: 'align-middle text-center' },
                    { data: "actions", name: "actions", orderable: false, searchable: false, width: "5%" },
                ],
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"],
                ],
            });

            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var nama_karyawan = form.data("nama_karyawan");

                Swal.fire({
                    title: "Apakah Anda Yakin Menghapus Karyawan " + nama_karyawan + "?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
