@extends('tes')
@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Kategori</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>

        <div class="list-group">
            @foreach($categories as $category)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $category->name }}</span>
                <div>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection
