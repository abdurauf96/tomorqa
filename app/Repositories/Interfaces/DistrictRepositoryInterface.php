<?php

namespace App\Repositories\Interfaces;


interface DistrictRepositoryInterface{
    public function getItems($keyword);
    public function store($data);
    public function findOne($id);
    public function update($data, $id);
}