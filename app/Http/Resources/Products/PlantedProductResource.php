<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class PlantedProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->product->name,
            'region'=>$this->region->name,
            'district'=>$this->district->name,
            'quarter'=>$this->quarter->name,
            'home_number'=>$this->home_number,
            'owner'=>$this->owner,
            'amount'=>$this->amount,
        ];
    }
}
