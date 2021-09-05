<?php

namespace App\Http\Controllers;

use App\Repositories\Tour\TourRepositoryInterface;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $repo;

    public function __construct(TourRepositoryInterface $tourRepository)
    {
        $this->repo = $tourRepository;
    }

    /*
    |-------------------------------------------------------------------
    | Tours.
    |-------------------------------------------------------------------
    | Xu li cac thong tin lien quan den bang tours.
    */

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('test.tour.index');
    }

    public function indexData()
    {
        $columns = [
            'tours.id as id',
            'tours.name as name',
            'areas.name as area',
            'locations.name as location',
        ];
        return response()->json($this->repo->getAll($columns));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $areas = $this->repo->getAllArea();
        $locations = $this->repo->getAllLocation();
        $promotions = $this->repo->getAllPromotion();
        $tags = $this->repo->getAllTag();
        $vehicles = $this->repo->getAllVehicle();

        return view('test.tour.add', compact('areas', 'locations', 'promotions', 'tags', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        dd($request->include);
        $rs = $this->repo->store($request);
        toast($rs['msg'], $rs['type']);

        return redirect()->route('admin.tour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tourId
     * @return \Illuminate\Http\Response
     */
    public function show($tourId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tourId
     * @return View
     */
    public function edit($tourId)
    {
        $tour = $this->repo->find($tourId);
        $areas = $this->repo->getAllArea();
        $locations = $this->repo->getAllLocation();
        $promotions = $this->repo->getAllPromotion();

        return view('test.tour.edit', compact('tour', 'areas', 'locations', 'promotions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tourId
     * @return Redirect
     */
    public function update(Request $request, $tourId)
    {
        $rs = $this->repo->update($request, $tourId);
        toast($rs['msg'], $rs['type']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tourId
     * @return Redirect
     */
    public function destroy($tourId)
    {
        $rs = $this->repo->destroy($tourId);
        if ($rs['type'] == 'error') {
            return response()->json($rs, 500);
        }

        return response()->json($rs);
    }

    /*
    |-------------------------------------------------------------------
    | Other Days.
    |-------------------------------------------------------------------
    | Xu li cac thong tin lien quan den bang other_days.
    */

    /**
     * Luu other_day.
     */
    // public function storeTourDetail(Request $request)
    // {
    //     $rs = $this->repo->storeTourDetail($request);
    //     toast($rs['msg'], $rs['type']);

    //     return back();
    // }

    /**
     * Update other_day.
     */
    // public function updateTourDetail(Request $request, $tourDetailId)
    // {
    //     $rs = $this->repo->updateTourDetail($request, $tourDetailId);
    //     toast($rs['msg'], $rs['type']);

    //     return back();
    // }

    // public function destroyTourDetail($tourDetailId)
    // {
    //     $rs = $this->repo->destroy($tourDetailId);
    //     toast($rs['msg'], $rs['type']);

    //     return back();
    // }

    /*
    |-------------------------------------------------------------------
    | Tour Images.
    |-------------------------------------------------------------------
    | Xu li cac thong tin lien quan den bang tour_images.
    */

    /*
    |-------------------------------------------------------------------
    | Tour Plans.
    |-------------------------------------------------------------------
    | Xu li cac thong tin lien quan den bang tour_plans.
    */
}
