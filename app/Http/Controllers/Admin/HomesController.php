<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Home;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $homes = Home::where('region_id', 'LIKE', "%$keyword%")
                ->orWhere('district_id', 'LIKE', "%$keyword%")
                ->orWhere('quarter_id', 'LIKE', "%$keyword%")
                ->orWhere('street_id', 'LIKE', "%$keyword%")
                ->orWhere('home_number', 'LIKE', "%$keyword%")
                ->orWhere('landarea', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $homes = Home::latest()->paginate($perPage);
        }

        return view('admin.homes.index', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $districts=\App\Models\District::all();
        $regions=\App\Models\Region::all();
        $quarters=\App\Models\Quarter::all();
        $streets=\App\Models\Street::all();
        return view('admin.homes.create', compact('regions', 'districts', 'quarters', 'streets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'region_id' => 'required',
			'district_id' => 'required',
			'quarter_id' => 'required',
			'street_id' => 'required',
			'home_number' => 'required',
			'landarea' => 'required'
		]);
        $requestData = $request->all();
        
        Home::create($requestData);

        return redirect('admin/homes')->with('flash_message', 'Xonadon saqlandi!');
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
        $home = Home::findOrFail($id);

        return view('admin.homes.show', compact('home'));
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
        $home = Home::findOrFail($id);
        $districts=\App\Models\District::all();
        $regions=\App\Models\Region::all();
        $quarters=\App\Models\Quarter::all();
        $streets=\App\Models\Street::all();
        return view('admin.homes.edit', compact('home', 'regions', 'districts', 'quarters', 'streets'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'region_id' => 'required',
			'district_id' => 'required',
			'quarter_id' => 'required',
			'street_id' => 'required',
			'home_number' => 'required',
			'landarea' => 'required'
		]);
        $requestData = $request->all();
        
        $home = Home::findOrFail($id);
        $home->update($requestData);

        return redirect('admin/homes')->with('flash_message', 'Xonadon muvaffaqiyatli yangilandi!');
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
        Home::destroy($id);

        return redirect('admin/homes')->with('flash_message', 'Xonadon muvaffaqiyatli o`chirildi!');
    }
}
