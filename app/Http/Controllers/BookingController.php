<?php

namespace App\Http\Controllers;

use App\Models\Attendee_info;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Pick_Point;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];

        $results = Booking::orderBy('id', 'desc')->get();
        
        $arr=[];

        foreach ($results as $key => $value) {

            $arr[]=Payment::select('status')->where(['booking_id'=>$value->id])->first()->toArray();

            $value->booking_status=$arr;
        }


        return view('/content/booking/index', compact('pageConfigs','results'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result =  Attendee_info::find($id);
        if ($result) {
            $response = array('status' => 200, 'result' => $result);
        } else {
            $response = array('status' => 400, 'msg' => 'Something went wrong...!');
        }
        return json_encode($response);
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
        $requested_data = $request->except(['_token', '_method']);
        $request->validate(
            [
                'attendee_name' => 'required|string',
                'attendee_number' => 'required|string',
            ],
            [
                'attendee_name.required'      => 'Attendee Name is required.',
                'attendee_number.required'      => 'Attendee Number is required.',
            ]
        );
        try {
            $update  = Attendee_info::find($id);
            foreach ($requested_data as $key => $data) {
                $update->$key = $data;
            }
            $update->save();
            $response = array('status' => 200, 'msg' => 'Data updated successfully...!');
        } catch (\Throwable $th) {
            $response = array('status' => 500, 'msg' => 'Something went wrong...!');
        }

        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attendee_info(Request $request, $id)
    {
        $pageConfigs = ['pageHeader' => false];

        $results = Attendee_info::where(['booking_id' => $id])->get();

        $booking = Booking::where(['id' => $id])->first();

        $booking->coupon_name = Coupon::select('promo_code')->where(['id' => $booking->coupon_id])->first();

        $booking->pickup_point = Pick_Point::select('name')->where(['id' => $booking->pickup_id])->first();

        $booking->product_name = Product::select('name')->where(['id' => $booking->product_id])->first();

        foreach ($results as $key => $value) {

            $value->amount=$booking->total_amount;

        }
        
        return view('/content/booking/attendee_info', compact('pageConfigs','results'));
    }
}
