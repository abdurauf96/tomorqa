<?php

namespace App\Repositories\Interfaces;

interface StoredProductRepositoryInterface{
    public function getAll();
    public function store($data);
    public function findOne($id);
    public function update($data,$id);
    public function getSumAmount();
    public function getByGroupSum();
}