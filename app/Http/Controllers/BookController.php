<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Book;


class BookController extends Controller
{

    private $bookRepository;
    private $categoryRepository;

    public function __construct(BookRepositoryInterface $bookRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->bookRepository = $bookRepository ;
        $this->categoryRepository = $categoryRepository ;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->bookRepository->getAll();
        return view('buku.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('buku.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'category_id' => 'required',
        ]);

        $this->bookRepository->store($data);
        return redirect()->route('buku.index')->with('success', 'Data berhasil disimpan');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book =  $this->bookRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        return view ('buku.edit', compact ('book' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'category_id' => 'required',
        ]);

        $this->bookRepository->update($id, $data);
        return redirect()->route('buku.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
}
