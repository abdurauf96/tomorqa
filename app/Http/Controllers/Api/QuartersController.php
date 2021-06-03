<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quarter;
use Illuminate\Http\Request;

class QuartersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Quarter::all();

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
			'district_id' => 'required',
			'region_id' => 'required',
			'name' => 'required',
			'addres' => 'required',
			'leader' => 'required',
			'phone' => 'required'
		]);
        
        $data=Quarter::create($request->all());

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function show(Quarter $quarter)
    {
        return response()->json($quarter, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function edit(Quarter $quarter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quarter $quarter)
    {
        $this->validate($request, [
			'district_id' => 'required',
			'region_id' => 'required',
			'name' => 'required',
			'addres' => 'required',
			'leader' => 'required',
			'phone' => 'required'
		]);
        
        $data=$quarter->update($request->all());
        return response()->json($quarter, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quarter $quarter)
    {
        $data=$quarter->delete();
        return response()->json($quarter, 200);
    }
}
