@extends('tes')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Kategori</h1>

        <!-- Tombol Tambah Kategori -->
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-plus-circle"></i> Tambah Kategori
            </a>
        </div>

        <!-- Daftar Kategori -->
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm transition-scale">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $category->name }}</h5>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-lg {
            padding: 10px 20px;
            font-size: 1.1rem;
        }

        .transition-scale {
            transition: transform 0.3s ease;
        }

        .transition-scale:hover {
            transform: scale(1.02);
        }
    </style>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
