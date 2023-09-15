<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex justify-content-center">
        {{-- ABSEN --}}
        <a href="{{ route('absensi.show', ['id' => $employee->id]) }}" class="btn btn-outline-success me-2 absen-btn shadow">
            <i class="bi bi-calendar-check fs-6"></i>
        </a>

        {{-- DESTROY --}}
        <div>
            <form action="{{ route('absensis.destroy', ['absensi' => $employee->id]) }}" method="POST"
                class="your-form-class" data-nama_karyawan="{{ $employee->nama_karyawan }}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-danger btn-delete shadow">
                  <i class="bi bi-trash-fill fs-6"></i>
              </button>
          </form>
        </div>
    </div>
</body>
</html>

