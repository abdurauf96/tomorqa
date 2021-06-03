<?php

namespace App\Repositories;

use App\Models\StoredProduct;
use App\Repositories\Interfaces\StoredProductRepositoryInterface;

class StoredProductRepository implements StoredProductRepositoryInterface
{
    public function getAll()
    {
        return StoredProduct::latest()->get();
    }

    public function store($data)
    {
        for ($i=0; $i <count($data['amount']) ; $i++) { 
            if(isset($data['amount'][$i])){
                StoredProduct::create([
                    'region_id'=>$data['region_id'],
                    'district_id'=>$data['district_id'],
                    'quarter_id'=>$data['quarter_id'],
                    'street_id'=>$data['street_id'],
                    'home_number'=>$data['home_number'],
                    'owner'=>$data['owner'],
                    'firm_id'=>$data['firm_id'],
                    'product_id'=>$data['product_id'][$i],
                    'amount'=>$data['amount'][$i],
                ]);
            }
            
        }
    }

    public function findOne($id)
    {
        return StoredProduct::findOrFail($id);
    }

    public function update($data,$id)
    {
        $storedproduct=StoredProduct::findOrFail($id);
        return $storedproduct->update($data);
    }

    public function getSumAmount()
    {
        return StoredProduct::sum('amount');
    }

    public function getByGroupSum()
    {
        return StoredProduct::groupBy('product_id')->selectRaw('sum(amount) as sum, product_id')->orderBy('sum', 'DESC')->get();
    }

}