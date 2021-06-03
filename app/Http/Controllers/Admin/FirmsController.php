<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Firm;
use Illuminate\Http\Request;

class FirmsController extends Controller
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
            $firms = Firm::where('region_id', 'LIKE', "%$keyword%")
                ->orWhere('district_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('bank', 'LIKE', "%$keyword%")
                ->orWhere('bank_currency', 'LIKE', "%$keyword%")
                ->orWhere('addres', 'LIKE', "%$keyword%")
                ->orWhere('director', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('inn', 'LIKE', "%$keyword%")
                ->orWhere('hr', 'LIKE', "%$keyword%")
                ->orWhere('mfo', 'LIKE', "%$keyword%")
                ->orWhere('currency_mfo', 'LIKE', "%$keyword%")
                ->orWhere('currency_hr', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $firms = Firm::latest()->paginate($perPage);
        }

        return view('admin.firms.index', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $regions=\App\Models\Region::all();
        $districts=\App\Models\District::all();
        return view('admin.firms.create', compact('regions', 'districts'));
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
			'name' => 'required',
			'bank' => 'required',
			'bank_currency' => 'required',
			'addres' => 'required',
			'director' => 'required',
			'phone' => 'required'
		]);
        $requestData = $request->all();
        
        Firm::create($requestData);

        return redirect('admin/firms')->with('flash_message', 'Agrofirma saqlandi!');
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
        $firm = Firm::findOrFail($id);

        return view('admin.firms.show', compact('firm'));
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
        $firm = Firm::findOrFail($id);
        $regions=\App\Models\Region::all();
        $districts=\App\Models\District::all();
        return view('admin.firms.edit', compact('firm', 'regions', 'districts'));
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
			'name' => 'required',
			'bank' => 'required',
			'bank_currency' => 'required',
			'addres' => 'required',
			'director' => 'required',
			'phone' => 'required'
		]);
        $requestData = $request->all();
        
        $firm = Firm::findOrFail($id);
        $firm->update($requestData);

        return redirect('admin/firms')->with('flash_message', 'Agrofirma muvaffaqiyatli yangilandi!');
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
        Firm::destroy($id);

        return redirect('admin/firms')->with('flash_message', 'Agrofirma muvaffaqiyatli o`chirildi!');
    }
}
