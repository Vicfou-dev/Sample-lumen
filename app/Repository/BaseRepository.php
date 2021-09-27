<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface 
{
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all() 
    {
        return $this->model->all();
    }

    public function get($id) 
    {
        return $this->model->find($id);
    }

    public function create($data) 
    {
        if (is_array($data)) {
            return $this->model->create($data);
        }

        if (get_class($data) == get_class($this->model)) {
            return $data->save();
        }

        throw new InvalidArgumentException("L'argument de create doit être de type array ou de type ". get_class($this->model));
    }

    public function update($data, $id = 0, $attribute = "id") 
    {
        if ($data instanceof Model) {
            return $data->save();
        }
        if (is_array($data)) {
            return $this->model->where($attribute, '=', $id)->update($data);
        }

        throw new \InvalidArgumentException("Arguments must be a model or an array with an ID");
    }

    public function destroy($ids) 
    {
        return $this->model->destroy($ids);
    }

    public function delete() 
    {
        return $this->model->delete();
    }
}