<?php
namespace App\Repositories\Interfaces;

interface PlantedProductRepositoryInterface{
    public function getAll();
    public function findOne($id);
    public function store($data);
    public function update($data,$id);
    public function getByGroupSum();
    public function getSumAmount();
}