<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StoredProduct;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\StoredProductRepositoryInterface;
use App\Http\Requests\StoredProductRequest;
class StoredProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    private $repository;

    public function __construct(StoredProductRepositoryInterface $repository)
    {
        $this->repository=$repository;
    }

    public function index(Request $request)
    {
        
        $storedproducts=$this->repository->getAll();
        $categories=\App\Models\Category::all();
        return view('admin.stored-products.index', compact('storedproducts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($category_id)
    {
        
        $category_products=\App\Models\Product::where('category_id', $category_id)->get();
        return view('admin.stored-products.create', compact( 'category_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoredProductRequest $request)
    {
        
        if($this->is_product_exist($request->all())){
            $this->repository->store($request->all());
        }else{
           return redirect()->back()->withErrors(['Kamida 1ta mahsulot kiriting']);
        }

        return redirect('admin/stored-products')->with('flash_message', 'Mahsulot saqlandi!');
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
        $storedproduct = $this->repository->findOne($id);
        return view('admin.stored-products.show', compact('storedproduct'));
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
        $storedproduct = $this->repository->findOne($id);
        $category_products=\App\Models\Product::where('category_id', $storedproduct->product->category_id)->get();
        return view('admin.stored-products.edit', compact('storedproduct', 'category_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoredProductRequest $request, $id)
    {
        
        $requestData = $request->all();
        $this->repository->update($requestData, $id);
        return redirect('admin/stored-products')->with('flash_message', 'Mahsulot muvaffaqiyatli yangilandi!');
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
        StoredProduct::destroy($id);

        return redirect('admin/stored-products')->with('flash_message', 'Mahsulot muvaffaqiyatli o`chirildi!');
    }
}
