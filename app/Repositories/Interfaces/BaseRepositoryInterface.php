<?php

namespace App\Repositories\Interfaces;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface{
    
    public function getItems($keyword);

    public function store($data);

    public function findOne($id);
    
    public function update($data, $id);
}