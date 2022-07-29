<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Pick_Point;
use App\Models\Product;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];

        $points = Pick_Point::where(['status' => 1])->orderBy('name', 'DESC')->get();

        $products = Product::where(['status' => 1])->orderBy('name', 'DESC')->get();

        $results = Route::orderBy('route_name', 'DESC')->get();

        return view('/content/routes/index', compact('pageConfigs','points', 'products', 'results'));

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
        $requested_data = $request->except(['_token']);

        $request->validate(
            [
                'route_name' => ['required', 'string', Rule::unique('routes', 'route_name')],
                'product_id' => ['required', 'string'],
                'pickup_point_id' => 'required|array',
            ],
            [
                'pickup_point_id.required' => 'Pick Up Location is required.',
                'product_id.required' => 'Product Name is required.',
            ]
        );
        try {
            $store  = new Route;
            $store->route_name = $request->route_name;
            $store->product_id = $request->product_id;
            $store->pickup_point_id = implode(", ", $request->pickup_point_id);
            $store->created_by = Auth::user()->id;
            $store->save();
            $response = array('status' => 200, 'msg' => 'Data saved successfully...!');
        } catch (\Throwable $th) {
            $response = array('status' => 500, 'msg' => $th->getMessage());
        }
        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $routes = Route::where(['id' => $id])->first();

        $points = explode(', ', $routes->pickup_point_id);

        $results = array();

        foreach ($points as $key => $value) {

            $pickup = Pick_Point::select('name', 'counties_id')->where(['id' => $value])->first();

            $res['counties'] = County::select('name')->where(['id' => $pickup->counties_id])->first()->toArray();
            $res['pickup_point'] = $pickup->name;
            $results[] = $res;
        }

        return view('route.view', compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result =  Route::find($id);
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
                'route_name' => ['required', 'string'],
                'product_id' => ['required', 'string'],
                'pickup_point_id' => 'required|array',
            ],
            [
                'pickup_point_id.required' => 'Pick Up Location is required.',
                'product_id.required' => 'Product Name is required.',
            ]
        );

        try {
            $update  = Route::find($id);
            foreach ($requested_data as $key => $data) {
                $update->$key = $data;
            }
            $update->pickup_point_id = implode(', ', $request->pickup_point_id);
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
        Route::find($id)->delete($id);
        return json_encode([
            'status' => 200,
            'msg' => 'Record deleted successfully!'
        ]);
    }

    public function status($id)
    {
        // dd($id);
        try {
            $update  = Route::find($id);
            $update->status = !$update->status;
            $update->save();
            $response = array('status' => 200, 'msg' => 'Status updated successfully...!');
        } catch (\Throwable $th) {
            $response = array('status' => 500, 'msg' => 'Something went wrong...!');
        }
        return json_encode($response);
    }
}
