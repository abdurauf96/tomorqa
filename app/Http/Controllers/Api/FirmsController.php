<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Firm::all();
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
			'name' => 'required',
			'bank' => 'required',
			'bank_currency' => 'required',
			'addres' => 'required',
			'director' => 'required',
			'phone' => 'required'
		]);
        $requestData = $request->all();
        
        $data=Firm::create($requestData);
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        return response()->json($firm, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function edit(Firm $firm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $firm)
    {
        $this->validate($request, [
			'region_id' => 'required',
			'district_id' => 'required',
			'name' => 'required',
			'bank' => 'required',
			'bank_currency' => 'required',
			'addres' => 'required',
			'director' => 'required',
			'phone' => 'required'
		]);
        $requestData = $request->all();
        
        $data=$firm->update($requestData);
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        $firm->delete();
        return response()->json($firm, 200);
    }
}
