<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function observe($class)
    {
        return $this->model->observe($class);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $object = $this->model->find($id);

        if ($object) {
            $object->update($attributes);

            return $object;
        }

        return false;
    }

    public function delete($id)
    {
        $key = $this->model->getKeyName();

        if (is_string($key) && is_array($id)) {
            $objects = $this->model->whereIn($key, $id)->get();
            foreach ($objects as $object) {
                $object->delete();
            }
        } else {
            $this->model->find($id)->delete();
            return true;
        }

        return false;
    }
}
