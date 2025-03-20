@extends('tes')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white bg-gradient-primary p-3 rounded">Daftar Buku</h1>

    <!-- Tombol Tambah Buku dan Tambah Kategori -->
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('buku.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Buku
        </a>
        <a href="{{ route('categories.index') }}" class="btn btn-success btn-lg shadow-sm">
            <i class="fas fa-tag"></i> Tambah Kategori
        </a>
    </div>

    <!-- Daftar Buku -->
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 transition-scale">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $book->judul }}</h5>
                    <p class="card-text"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                    <p class="card-text"><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
                    <p class="card-text"><strong>Kategori:</strong> <span class="badge bg-secondary">{{ $book->category->name }}</span></p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between">
                    <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('buku.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
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
        margin-bottom: 20px;
    }
    .card-text {
        font-size: 1rem;
        color: #555;
        margin-bottom: 3px;
    }
    .badge {
        font-size: 0.9rem;
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
