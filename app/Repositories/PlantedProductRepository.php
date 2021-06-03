<?php

namespace App\Repositories;
use App\Models\PlantedProduct;
use App\Repositories\Interfaces\PlantedProductRepositoryInterface;

class PlantedProductRepository implements PlantedProductRepositoryInterface
{
    public function getAll()
    {
        return PlantedProduct::latest()->get();
    }

    public function findOne($id)
    {
        return PlantedProduct::findOrFail($id);
    }

    public function store($data)
    {
        for ($i=0; $i<count($data['amount']) ; $i++) { 
            if(isset($data['amount'][$i])){
                PlantedProduct::create([
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

    public function update($data, $id)
    {
        $product=PlantedProduct::findOrFail($id);
        $product->update($data);
    }

    public function getByGroupSum()
    {
        return PlantedProduct::groupBy('product_id')->selectRaw('sum(amount) as sum, product_id')->orderBy('sum', 'DESC')->get();
    }

    public function getSumAmount()
    {
        return PlantedProduct::sum('amount');
    }
}