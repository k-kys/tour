<?php

namespace App\Http\Controllers;

use App\Events\CustomerBooking;
use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $repo;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->repo = $bookingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tourId)
    {
        $tour = $this->repo->getTour($tourId);
        $promotion = $this->repo->getPromotion($tourId);
        $payments = $this->repo->getAllPayment();

        return view('booking', compact('tour', 'promotion', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rs = $this->repo->store($request);
        toast($rs['msg'], $rs['stt']);

        return redirect()->url('/detail-tour', [$rs['tour_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookingDetail($code)
    {
        $booking = $this->repo->getBookingDetail($code);

        return response()->json($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookingId)
    {
        $rs = $this->repo->destroy($bookingId);
        if ($rs['stt'] == 'error') {
            return response()->json($rs, 500);
        }

        return response()->json($rs);
    }
}
