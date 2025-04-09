<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BukuRepository;
use App\Repositories\CategoryRepository;

class BookController extends Controller
{
    private $bukuRepository;
    private $categoryRepository;

    // Memperbaiki konstruktor untuk menginjeksi semua dependensi yang dibutuhkan
    public function __construct(
        BukuRepository $bukuRepository,
        CategoryRepository $categoryRepository
    ) {
        // Menginisialisasi variabel dengan dependensi yang diterima
        $this->bukuRepository = $bukuRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan BukuReadRepositoryInterface untuk mengambil data buku
        $books = $this->bukuRepository->getAll();
        return view('buku.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua kategori menggunakan CategoryReadRepositoryInterface
        $categories = $this->categoryRepository->getAll();
        return view('buku.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'category_id' => 'required',
        ]);

        // Menggunakan BukuWriteRepositoryInterface untuk menyimpan data buku
        $this->bukuRepository->store($data);
        return redirect()->route('buku.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil buku berdasarkan ID menggunakan BukuReadRepositoryInterface
        $book = $this->bukuRepository->getById($id);
        // Mengambil kategori menggunakan CategoryReadRepositoryInterface
        $categories = $this->categoryRepository->getAll();
        return view('buku.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'category_id' => 'required',
        ]);

        // Menggunakan BukuWriteRepositoryInterface untuk mengupdate data buku
        $this->bukuRepository->update($id, $data);
        return redirect()->route('buku.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menggunakan BukuWriteRepositoryInterface untuk menghapus data buku
        $this->bukuRepository->delete($id);
        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
}
