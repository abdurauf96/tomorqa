<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlantedProductRequest;
use App\Http\Resources\Products\PlantedProductResource;
use App\Models\PlantedProduct;
use Illuminate\Http\Request;

class PlantedProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PlantedProductResource::collection(PlantedProduct::with('product', 'region', 'district', 'quarter')->get()), 200);
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
    public function store(PlantedProductRequest $request)
    {
        return response()->json(new PlantedProductResource(PlantedProduct::create($request->all())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantedProduct  $plantedProduct
     * @return \Illuminate\Http\Response
     */
    public function show(PlantedProduct $plantedProduct)
    {
        return response()->json(new PlantedProductResource($plantedProduct), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantedProduct  $plantedProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantedProduct $plantedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantedProduct  $plantedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantedProduct $plantedProduct)
    {
        return response()->json(new PlantedProductResource($plantedProduct->update($request->all())), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantedProduct  $plantedProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantedProduct $plantedProduct)
    {
        $plantedProduct->delete();
        return response()->json(null, 204);
    }
}
