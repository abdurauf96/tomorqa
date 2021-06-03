<?php

namespace App\Repositories;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\District;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface{


    public function __construct(District $model)
    {
        parent::__construct($model);
    }

    public function getItems($keyword)
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