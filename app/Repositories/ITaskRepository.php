<?php

namespace App\Repositories;


interface ITaskRepository {
    public function find($id);
    public function list($rowsQty);
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete($id);
    public function listFormat();
}