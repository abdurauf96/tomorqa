<?php 

namespace App\Repositories\Interfaces;

interface ExpectedProductRepositoryInterface{
    public function getItems($year,$month);
    public function store($data);
    public function findOne($id);
    public function update($data, $id);
    public function getByGroupSum();
    public function getByThisMonth();
    public function getSumAmount();
}

?>