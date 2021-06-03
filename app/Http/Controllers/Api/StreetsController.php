<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Street;
use Illuminate\Http\Request;

class StreetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Street::all();
        return response()->json($data, 200);
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
    public function store(Request $request)
    {
        $this->validate($request, [
			'region_id' => 'required',
			'district_id' => 'required',
			'quarter_id' => 'required',
			'name' => 'required'
		]);
        
        $data=Street::create($request->all());
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function show(Street $street)
    {
        return response()->json($street, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function edit(Street $street)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Street $street)
    {
        $this->validate($request, [
			'region_id' => 'required',
			'district_id' => 'required',
			'quarter_id' => 'required',
			'name' => 'required'
		]);
        
        $data=$street->update($request->all());
        return response()->json($street, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function destroy(Street $street)
    {
        $street->delete();
        return response()->json($street, 200);
    }
}
