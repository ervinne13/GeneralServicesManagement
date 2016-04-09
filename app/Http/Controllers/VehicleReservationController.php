<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\VehicleReservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use function response;
use function view;

class VehicleReservationController extends Controller {

    public function cancelReservation(Request $request) {
        try {
            VehicleReservation::
                    where("period_from", $request->period_from)
                    ->where("period_to", $request->period_to)
                    ->where("vehicle_asset_code", $request->vehicle_asset_code)
                    ->delete()
            ;
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return redirect(url("transportation"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {
            $reservation = new VehicleReservation($request->toArray());

            $reservation->reserved_by_username = Auth::user()->username;

            $reservation->save();
            return $reservation;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        $splittedId = \explode("|", $id);
        $periodFrom = $splittedId[0];
        $periodTo   = $splittedId[1];
        $assetCode  = $splittedId[2];

        $viewData = $this->getDefaultViewData();

        $viewData["vehicles"]    = Vehicle::all();
        $viewData["drivers"]     = Driver::all();
        $viewData["reservation"] = VehicleReservation::Vehicle($assetCode)->period($periodFrom, $periodTo)->first();
        $viewData["mode"]        = "edit";
        $viewData["id"]          = $id;

        return view("pages.vehicle-reservation.form", $viewData);
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

            $splittedId = \explode("|", $id);
            $periodFrom = $splittedId[0];
            $periodTo   = $splittedId[1];
            $assetCode  = $splittedId[2];

            $reservation = VehicleReservation::Vehicle($assetCode)->period($periodFrom, $periodTo)->first();
            $reservation->fill($request->toArray());

            $reservation->reserved_by_username = Auth::user()->username;

            $reservation->save();
            return $reservation;
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
        //
    }

}
