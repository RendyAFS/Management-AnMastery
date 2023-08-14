<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex justify-content-center">
        <a href="{{route('suppliers.edit', ['supplier' => $supplier->id])}}" class="btn btn-outline-primary me-2">
            <i class="bi bi-pencil-square fs-6"></i>
        </a>

        <div>
            <form action="{{ route('suppliers.destroy', ['supplier' => $supplier->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger" >
                    <i class="bi bi-trash-fill fs-6 "></i>
                </button>
            </form>
        </div>
    </div>
</body>
</html>

