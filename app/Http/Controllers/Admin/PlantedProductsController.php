<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PlantedProduct;
use Illuminate\Http\Request;
use App\Http\Requests\PlantedProductRequest;
use App\Repositories\Interfaces\PlantedProductRepositoryInterface;
class PlantedProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    private $repository;

    public function __construct(PlantedProductRepositoryInterface $repository)
    {
        $this->repository=$repository;
    }
    public function index(Request $request)
    {
        $plantedproducts=$this->repository->getAll();
        $categories=\App\Models\Category::all();
        return view('admin.planted-products.index', compact('plantedproducts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($category_id)
    {
        $category_products=\App\Models\Product::where('category_id', $category_id)->get();
        return view('admin.planted-products.create', compact( 'category_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PlantedProductRequest $request)
    {
        if($this->is_product_exist($request->all())){
            $this->repository->store($request->all());
        }else{
           return redirect()->back()->withErrors(['Kamida 1ta mahsulot kiriting']);
        }
        
        return redirect('admin/planted-products')->with('flash_message', 'Ekilgan mahsulot saqlandi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $plantedproduct = $this->repository->findOne($id);

        return view('admin.planted-products.show', compact('plantedproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $plantedproduct = $this->repository->findOne($id);
        $category_products=\App\Models\Product::where('category_id', $plantedproduct->product->category_id)->get();
        return view('admin.planted-products.edit', compact('plantedproduct', 'category_products'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PlantedProductRequest $request, $id)
    {
        $requestData = $request->all();
        $this->repository->update($requestData, $id);
        return redirect('admin/planted-products')->with('flash_message', 'Ekilgan mahsulot muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PlantedProduct::destroy($id);

        return redirect('admin/planted-products')->with('flash_message', 'Ekilgan mahsulot muvaffaqiyatli o`chirildi!');
    }
}
