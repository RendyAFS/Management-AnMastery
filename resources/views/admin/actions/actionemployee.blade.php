<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex justify-content-center">
        <a href="#" class="btn btn-outline-primary me-2 edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $employee->id }}">
            <i class="bi bi-pencil-square fs-6"></i>
        </a>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    @include('admin.actions.editkaryawan')
                </div>
            </div>
        </div>


        <div>
            <form action="{{ route('absensis.destroy', ['absensi' => $employee->id]) }}" method="POST"
                class="your-form-class" data-nama_karyawan="{{ $employee->nama_karyawan }}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-danger btn-delete">
                  <i class="bi bi-trash-fill fs-6"></i>
              </button>
          </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('absensis.edit', ['absensi' => ':id']) }}".replace(':id', id),
                    method: 'GET',
                    success: function(response) {
                        $('#editModal .modal-content').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>

