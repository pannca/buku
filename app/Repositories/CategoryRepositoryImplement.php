<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\CategoryRepository;


class CategoryRepositoryImplement implements CategoryRepository {

     // Mengambil semua kategori
     public function getAll()
     {
         return Category::all();
     }

     // Mengambil kategori berdasarkan ID
     public function getById($id)
     {
         return Category::findOrFail($id);
     }

     // Implementasi operasi tulis

     // Menyimpan kategori baru
     public function store(array $data)
     {
         return Category::create($data);
     }

     // Memperbarui kategori
     public function update($id, array $data)
     {
         $kategori = Category::findOrFail($id);
         $kategori->update($data);
         return $kategori;
     }

     // Menghapus kategori
     public function delete($id)
     {
         return Category::destroy($id);
     }
}

