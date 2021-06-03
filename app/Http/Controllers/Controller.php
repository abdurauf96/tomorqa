<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function is_product_exist($data)
    {
        $value=1;
        for ($i=0; $i <count($data['amount']) ; $i++) { 
            if(!is_null($data['amount'][$i])){
                $value++;
            }
        };
        if($value!=1){
            return true;
        }else{
            return false;
        }
    }
}


