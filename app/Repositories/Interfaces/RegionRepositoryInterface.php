<?php

namespace App\Repositories\Interfaces;
use App\Models\Region;

interface RegionRepositoryInterface{
    public function getItems($keyword);
    public function store($data);
    public function findOne($id);
    public function update($data, $id);
}