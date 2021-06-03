<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoredProduct;
use Illuminate\Http\Request;
use App\Http\Resources\Products\StoredProductResource;
use App\Http\Requests\StoredProductRequest;
class StoredProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=StoredProduct::with('product', 'region', 'district', 'quarter')->get();
        return response()->json(StoredProductResource::collection($data), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredProductRequest $request)
    {
        return response()->json(new StoredProductResource(StoredProduct::create($request->all())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoredProduct  $storedProduct
     * @return \Illuminate\Http\Response
     */
    public function show(StoredProduct $storedProduct)
    {
        return response()->json(new StoredProductResource($storedProduct), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoredProduct  $storedProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(StoredProduct $storedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StoredProduct  $storedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, StoredProduct $storedProduct)
    {
        return response()->json(new StoredProductResource($storedProduct->update($request->all())), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoredProduct  $storedProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoredProduct $storedProduct)
    {
        $storedProduct->delete();
        return response()->json(null, 204);
    }
}
