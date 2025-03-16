<?php

namespace App\Repositories;

interface CategoryRepositoryInterface {

    public function getAll();
    public function index();
    public function create($id);
    public function edit($id);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}
