<?php
namespace App\Repository;

interface BaseRepositoryInterface 
{
    public function all();

    public function get($id);

    public function create($data);

    public function update($data, $id = 0, $attribute = "id");

    public function destroy($ids);

    public function delete();
}