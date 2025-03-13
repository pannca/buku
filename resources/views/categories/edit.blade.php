@extends('tes')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white bg-gradient-primary p-3 rounded">Edit Kategori</h1>

    <!-- Form Edit Kategori -->
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori:</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
            <div class="d-grid mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
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
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .form-label {
        font-weight: bold;
    }
    .btn-primary {
        background-color: #0d6efd;
        border: none;
        padding: 10px;
        font-size: 1.1rem;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
    }
</style>

<!-- FontAwesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
