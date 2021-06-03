<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpectedProductRequest;
use App\Http\Resources\Products\ExpectedProductResource;
use App\Models\ExpectedProduct;
use Illuminate\Http\Request;

class ExpectedProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ExpectedProductResource::collection(ExpectedProduct::with('product', 'region', 'district', 'quarter')->get()),200);
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
    public function store(ExpectedProductRequest $request)
    {
        return response()->json(new ExpectedProductResource(ExpectedProduct::create($request->all())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpectedProduct  $expectedProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ExpectedProduct $expectedProduct)
    {
        return response()->json(new ExpectedProductResource($expectedProduct), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpectedProduct  $expectedProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpectedProduct $expectedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpectedProduct  $expectedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(ExpectedProductRequest $request, ExpectedProduct $expectedProduct)
    {
        return response()->json(new ExpectedProductResource($expectedProduct->update($request->all())), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpectedProduct  $expectedProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpectedProduct $expectedProduct)
    {
        $expectedProduct->delete();
        return response()->json(null, 204);
    }
}
