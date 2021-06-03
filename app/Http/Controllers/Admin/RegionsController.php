<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\RegionRepositoryInterface;

class RegionsController extends Controller
{

    private $regionRepository;

    public function __construct(RegionRepositoryInterface $regionRepository)
    {
        $this->regionRepository=$regionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        //get regions with searching results
        $regions=$this->regionRepository->getItems($keyword);

        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.regions.create');
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
            'name'=>'required'
        ]);

        $this->regionRepository->store($request->all());

        return redirect('admin/regions')->with('flash_message', 'Viloyat muvaffaqiyatli saqlandi!');
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
        $region = $this->regionRepository->findOne($id);

        return view('admin.regions.show', compact('region'));
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
        $region = $this->regionRepository->findOne($id);

        return view('admin.regions.edit', compact('region'));
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
			'name' => 'required'
		]);
        $data = $request->all();
        
        $region = $this->regionRepository->update($data, $id);

        return redirect('admin/regions')->with('flash_message', ' Viloyat muvaffaqiyatli yangilandi!');
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
        Region::destroy($id);
        return redirect('admin/regions')->with('flash_message', 'Viloyat muvaffaqiyatli o`chirildi!');
    }
}
