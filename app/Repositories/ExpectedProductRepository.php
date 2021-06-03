<?php 

namespace App\Repositories;
use App\Models\ExpectedProduct;
use App\Repositories\Interfaces\ExpectedProductRepositoryInterface;
class ExpectedProductRepository implements ExpectedProductRepositoryInterface{

    protected $model;

    public function __construct(ExpectedProduct $model)
    {
        $this->model=$model;
    }

    public function getItems($year,$month)
    {
        $model=$this->model::query();

        if ($year) {
            $data = $model->whereYear('expected_date', $year);
        } 
        if($month){
            $data = $model->whereMonth('expected_date', $month);
        }
        $data = $model->latest()->get();
        return $data;
    }

    public function findOne($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        for ($i=0; $i <count($data['amount']) ; $i++) { 
            if(isset($data['amount'][$i])){
                $this->model::create([
                    'region_id'=>$data['region_id'],
                    'district_id'=>$data['district_id'],
                    'quarter_id'=>$data['quarter_id'],
                    'street_id'=>$data['street_id'],
                    'home_number'=>$data['home_number'],
                    'owner'=>$data['owner'],
                    'firm_id'=>$data['firm_id'],
                    'product_id'=>$data['product_id'][$i],
                    'amount'=>$data['amount'][$i],
                    'expected_date'=>$data['expected_date'][$i],
                ]);
            }
            
        }
    }

    public function update($data, $id)
    {
        $item=$this->model->findOrFail($id);
        $item->update($data);
    }

    public function getByGroupSum()
    {
        return $this->model->groupBy('product_id')->selectRaw('sum(amount) as sum, product_id')->orderBy('sum', 'DESC')->get();
    }

    public function getByThisMonth()
    {
        return $this->model->whereMonth('expected_date', date('m'))->whereYear('expected_date', date('Y'))->limit(10)->get();
    }

    public function getSumAmount()
    {
        return $this->model->sum('amount');
    }

}

?>