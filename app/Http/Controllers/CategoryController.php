<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepositoryInterface;
class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $categories = $this->categoryRepository->getAll();
        return view('categories.index', compact('categories'));
    }

    public function create () {
        return view('categories.create');
    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:255', // Pastikan input valid
        ]);

        $this->categoryRepository->store($data); // Simpan data tanpa mengubah $this

        return redirect()->route('categories.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id) {
        $category = $this->categoryRepository->edit($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate ([
            'name' => 'required',
        ]);

        $this->categoryRepository->update($id, $data);
        return redirect()->route('categories.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id) {
        $this->categoryRepository->delete($id);
        return redirect()->route('categories.index')->with('success', 'Data berhasil dihapus');
    }
}
