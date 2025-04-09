<?php

namespace App\Repositories;

use App\Models\Book;

class BukuRepositoryImplement implements BukuRepository
{
    // Mengambil semua data buku dengan kategori
    public function getAll() {
        return Book::with('category')->get();
    }

    // Mengambil buku berdasarkan ID
    public function getById($id) {
        return Book::findOrFail($id);
    }

    // Menyimpan data buku
    public function store(array $data) {
        return Book::create($data);
    }

    // Mengupdate data buku berdasarkan ID
    public function update($id, array $data) {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    // Menghapus buku berdasarkan ID
    public function delete($id) {
        return Book::destroy($id);
    }
}
