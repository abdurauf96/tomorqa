<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function getItems($keyword)
    {   
        $perPage = 25;
        if (!empty($keyword)) {
            $items = $this->model->where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $items = $this->model->latest()->paginate($perPage);
        }
        return $items;
        
    }

    public function store($data)
    {
        $this->model->create($data);
    }

    public function findOne($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($data, $id)
    {
        $item=$this->findOne($id);
        $item->update($data);
    }
}