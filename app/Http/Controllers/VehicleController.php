<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleReservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function redirect;
use function response;
use function url;
use function view;

class VehicleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return redirect(url("transportation#vehicles-tab"));
    }

    public function datatable() {
        return Datatables::of(Vehicle::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData = $this->getDefaultViewData();

        $viewData["vehicle"] = new Vehicle();
        $viewData["mode"]    = "create";

        return view("pages.vehicles.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {
            $vehicle = new Vehicle($request->toArray());
            $vehicle->save();

            return $vehicle;
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $viewData = $this->getDefaultViewData();

        $viewData["vehicle"] = Vehicle::find($id);
        $viewData["mode"]    = "view";

        return view("pages.vehicles.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData = $this->getDefaultViewData();

        $viewData["vehicle"] = Vehicle::find($id);
        $viewData["mode"]    = "edit";

        return view("pages.vehicles.form", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        try {
            $vehicle = Vehicle::find($id);
            $vehicle->fill($request->toArray());
            $vehicle->save();

            return $vehicle;
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        try {
            VehicleReservation::Vehicle($id)->delete();
            Vehicle::destroy($id);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

}
