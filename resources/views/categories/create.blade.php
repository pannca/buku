@extends('tes')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Kategori</h1>
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
