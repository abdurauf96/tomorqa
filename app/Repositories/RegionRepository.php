<?php

namespace App\Repositories;
use App\Repositories\Interfaces\RegionRepositoryInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Region;

class RegionRepository extends BaseRepository implements RegionRepositoryInterface{


    public function __construct(Region $model)
    {
        parent::__construct($model);
    }

    public function getItems($keyword=null)
    {
        return parent::getItems($keyword);   
    }

    
    public function store($data)
    {
        parent::store($data);
    }

    public function findOne($id)
    {
        return parent::findOne($id);
    }

    public function update($data, $id)
    {
        return parent::update($data, $id);
    }
}