<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Street;
use Illuminate\Http\Request;

class StreetsController extends Controller
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
            $streets = Street::where('region_id', 'LIKE', "%$keyword%")
                ->orWhere('district_id', 'LIKE', "%$keyword%")
                ->orWhere('quarter_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $streets = Street::latest()->paginate($perPage);
        }

        return view('admin.streets.index', compact('streets'));
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
        return view('admin.streets.create', compact('quarters', 'districts', 'regions'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        Street::create($requestData);

        return redirect('admin/streets')->with('flash_message', 'Ko`cha saqlandi!');
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
        $street = Street::findOrFail($id);

        return view('admin.streets.show', compact('street'));
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
        $street = Street::findOrFail($id);
        $districts=\App\Models\District::all();
        $regions=\App\Models\Region::all();
        $quarters=\App\Models\Quarter::all();
        return view('admin.streets.edit', compact('quarters', 'districts', 'regions', 'street'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $street = Street::findOrFail($id);
        $street->update($requestData);

        return redirect('admin/streets')->with('flash_message', 'Ko`cha muvaffaqiyatli yangilandi!');
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
        Street::destroy($id);

        return redirect('admin/streets')->with('flash_message', 'Ko`cha muvaffaqiyatli o`chirildi!');
    }
}
