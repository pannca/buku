<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {

    public function getAll() {
        return Category::all();
    }

    public function index() {
        return Category::all();
    }

    public function create($id) {
        return Category::create($id);
    }

    public function edit($id) {
        return Category::findOrFail($id);
    }

    public function update($id, array $data) {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id) {
        return Category::destroy($id);
    }

    public function store(array $data) {
        return Category::create($data);
    }
}
