<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\VehicleReservation;
use function view;

class TransportationController extends Controller {

    public function index() {
        $viewData = $this->getDefaultViewData();

        $viewData["vehicles"]    = Vehicle::all();
        $viewData["drivers"]     = Driver::all();
        $viewData["reservation"] = new VehicleReservation();

        return view("pages.transportation.index", $viewData);
    }

}
