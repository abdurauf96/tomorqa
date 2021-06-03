<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StoredProduct;
use App\Models\PlantedProduct;
use App\Models\ExpectedProduct;
use App\Repositories\Interfaces\ExpectedProductRepositoryInterface;
use App\Repositories\Interfaces\PlantedProductRepositoryInterface;
use App\Repositories\Interfaces\StoredProductRepositoryInterface;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */

    private $expectedproductRepository;
    private $plantedproductRepository;
    private $storedproductRepository;

    public function __construct(ExpectedProductRepositoryInterface $expectedproductRepository, PlantedProductRepositoryInterface $plantedproductRepository, StoredProductRepositoryInterface $storedproductRepository)
    {
        $this->expectedproductRepository=$expectedproductRepository;
        $this->plantedproductRepository=$plantedproductRepository;
        $this->storedproductRepository=$storedproductRepository;
    }
    
    public function dashboard()
    {
        $amount_stored_products=$this->storedproductRepository->getSumAmount();
        $amount_planted_products=$this->plantedproductRepository->getSumAmount();
        $amount_expected_products=$this->expectedproductRepository->getSumAmount();
        
        $storedproducts = $this->storedproductRepository->getByGroupSum();
        $plantedproducts = $this->plantedproductRepository->getByGroupSum();
        $expectedproducts = $this->expectedproductRepository->getByGroupSum();
        
        $expectedproducts_thismonth=$this->expectedproductRepository->getByThisMonth();
        $agrofirms=\App\Models\Firm::all();
        $regions=\App\Models\Region::all();

        $statPlantedProductsByRegions="";
        $statStoredProductsByRegions="";
        foreach ($regions as $region) {
            $statStoredProductsByRegions.="['$region->name',". ($region->stored_products->sum('amount')/1000)."],";
            $statPlantedProductsByRegions.="['$region->name',". ($region->planted_products->sum('amount')/100)."],";
        };
       
        return view('admin.dashboard', compact('amount_stored_products', 'amount_planted_products', 'amount_expected_products', 'plantedproducts', 'storedproducts', 'expectedproducts', 'expectedproducts_thismonth','statPlantedProductsByRegions','statStoredProductsByRegions', 'agrofirms'));
    }
}
