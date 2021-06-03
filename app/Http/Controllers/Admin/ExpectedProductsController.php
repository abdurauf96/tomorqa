<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ExpectedProduct;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ExpectedProductRepositoryInterface;
use App\Http\Requests\ExpectedProductRequest;

class ExpectedProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    private $expectedproductRepository;

    public function __construct(ExpectedProductRepositoryInterface $expectedproductRepository)
    {
        $this->expectedproductRepository=$expectedproductRepository;
    }
    
    public function index(Request $request)
    {
        $year = $request->get('year');
        $month = $request->get('month');
        $expectedproducts=$this->expectedproductRepository->getItems($year,$month);
        
        $categories=\App\Models\Category::all();
        return view('admin.expected-products.index', compact('expectedproducts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($category_id)
    {
        $category_products=\App\Models\Product::where('category_id', $category_id)->get();
        
        return view('admin.expected-products.create', compact('category_products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ExpectedProductRequest $request)
    {
      
        if($this->is_product_exist($request->all())){
            $this->expectedproductRepository->store($request->all());
        }else{
           return redirect()->back()->withErrors(['Kamida 1ta mahsulot kiriting']);
        }

        return redirect('admin/expected-products')->with('flash_message', 'Mahsulot saqlandi!');
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
        $expectedproduct = $this->expectedproductRepository->findOne($id);

        return view('admin.expected-products.show', compact('expectedproduct'));
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
        $expectedproduct = $this->expectedproductRepository->findOne($id);
        
        $category_products=\App\Models\Product::where('category_id', $expectedproduct->product->category_id)->get(); 
        
        return view('admin.expected-products.edit', compact('expectedproduct', 'category_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ExpectedProductRequest $request, $id)
    {
        $requestData = $request->all();
        
        $this->expectedproductRepository->update($requestData, $id);

        return redirect('admin/expected-products')->with('flash_message', 'Mahsulot muvaffaqiyatli yangilandi!');
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
        ExpectedProduct::destroy($id);

        return redirect('admin/expected-products')->with('flash_message', 'Mahsulot muvaffaqiyatli o`chirildi!');
    }
}
