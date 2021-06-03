<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Quarter;
use Illuminate\Http\Request;

class QuartersController extends Controller
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
            $quarters = Quarter::where('district_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('addres', 'LIKE', "%$keyword%")
                ->orWhere('leader', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quarters = Quarter::latest()->paginate($perPage);
        }

        return view('admin.quarters.index', compact('quarters'));
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
        return view('admin.quarters.create', compact('districts', 'regions'));
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
			'district_id' => 'required',
			'region_id' => 'required',
			'name' => 'required',
			'addres' => 'required',
			'leader' => 'required',
			'phone' => 'required'
		]);
        $requestData = $request->all();
        
        Quarter::create($requestData);

        return redirect('admin/quarters')->with('flash_message', 'Quarter saqlandi!');
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
        $quarter = Quarter::findOrFail($id);

        return view('admin.quarters.show', compact('quarter'));
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
        $quarter = Quarter::findOrFail($id);
        $districts=\App\Models\District::all();
        $regions=\App\Models\Region::all();
        return view('admin.quarters.edit', compact('quarter', 'regions', 'districts'));
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
			'district_id' => 'required',
			'name' => 'required',
			'addres' => 'required',
			'leader' => 'required',
			'phone' => 'required'
		]);
        $requestData = $request->all();
        
        $quarter = Quarter::findOrFail($id);
        $quarter->update($requestData);

        return redirect('admin/quarters')->with('flash_message', 'Quarter muvaffaqiyatli yangilandi!');
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
        Quarter::destroy($id);

        return redirect('admin/quarters')->with('flash_message', 'Quarter muvaffaqiyatli o`chirildi!');
    }
}
