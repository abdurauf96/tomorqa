<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\District;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\RegionRepositoryInterface;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    private $districtRepository;
    private $regionRepository;

    public function __construct(DistrictRepositoryInterface $districtRepository, RegionRepositoryInterface $regionRepository)
    {
        $this->districtRepository=$districtRepository;
        $this->regionRepository=$regionRepository;
    }


    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $districts=$this->districtRepository->getItems($keyword);

        return view('admin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $regions=$this->regionRepository->getItems();
        return view('admin.districts.create', compact('regions'));
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
			'name' => 'required'
		]);
        $this->districtRepository->store($request->all());

        return redirect('admin/districts')->with('flash_message', 'Shahar muvaffaqiyatli saqlandi!');
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
        $district = $this->districtRepository->findOne($id);

        return view('admin.districts.show', compact('district'));
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
        $district = $this->districtRepository->findOne($id);
        $regions=$this->regionRepository->getItems();
        return view('admin.districts.edit', compact('district', 'regions'));
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
			'name' => 'required'
		]);
        
        $district = $this->districtRepository->update($request->all(), $id);

        return redirect('admin/districts')->with('flash_message', 'Shahar muvaffaqiyatli yangilandi!');
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
        District::destroy($id);

        return redirect('admin/districts')->with('flash_message', 'Shahar muvaffaqiyatli o`chirildi!');
    }
}
