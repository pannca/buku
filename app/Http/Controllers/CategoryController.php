<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    // Menginjeksi categoryRepositoryInterface dan categoryRepositoryInterface
    public function __construct(
        CategoryRepository $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    // Menampilkan semua kategori
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories.index', compact('categories'));
    }

    // Menampilkan form untuk membuat kategori
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi data input
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Menyimpan data kategori
        $this->categoryRepository->store($data);

        return redirect()->route('categories.index')->with('success', 'Data berhasil disimpan');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        // Mengambil data kategori berdasarkan ID
        $category = $this->categoryRepository->getById($id);
        return view('categories.edit', compact('category'));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        // Validasi data input
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Memperbarui data kategori
        $this->categoryRepository->update($id, $data);

        return redirect()->route('categories.index')->with('success', 'Data berhasil diupdate');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        // Menghapus kategori berdasarkan ID
        $this->categoryRepository->delete($id);
        return redirect()->route('categories.index')->with('success', 'Data berhasil dihapus');
    }
}
