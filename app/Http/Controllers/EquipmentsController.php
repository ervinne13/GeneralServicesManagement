<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Equipment;
use App\Models\EquipmentLocation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class EquipmentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();

        $viewData["equipments"] = Equipment::all();
        $viewData["areas"]      = Area::all();

        return view("pages.equipments.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(Equipment::query())->make(true);
    }

    public function equipmentLocations($id) {
        return EquipmentLocation::EquipmentId($id)->with("area")->get();
    }

    public function equipmentStockInfo($equipmentId, Request $request) {
        $equipment = Equipment::find($equipmentId);

        $stocksOnArea = 0;
        if ($request->area) {
            $equipmentLocation = EquipmentLocation::EquipmentId($equipmentId)->area($request->area)->first();

            if ($equipmentLocation) {
                $stocksOnArea = $equipmentLocation->qty;
            }
        }

        return [
            "stocks_on_hand" => $equipment->getOnHandQty(),
            "stocks_on_area" => $stocksOnArea
        ];
    }

    public function borrowEquipment(Request $request) {
        try {
            $equipment                  = Equipment::find($request->equipment_id);
            $resultingEquipmentLocation = $equipment->borrowEquipment($request->area_code, $request->qty);
            return $resultingEquipmentLocation;
        } catch (Exception $e) {
            throw $e;
//            return response($e->getMessage(), 500);
        }
    }

    public function returnEquipment(Request $request) {
        try {
            $equipment                  = Equipment::find($request->equipment_id);
            $resultingEquipmentLocation = $equipment->returnEquipment($request->area_code, $request->qty);
            return $resultingEquipmentLocation;
        } catch (Exception $e) {
            throw $e;
//            return response($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $viewData = $this->getDefaultViewData();

        $viewData["equipment"] = new Equipment();
        $viewData["mode"]      = "create";

        return view("pages.equipments.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {
            $equipment = new Equipment($request->toArray());
            $equipment->save();
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
        $viewData = $this->getDefaultViewData();

        $viewData["equipment"] = Equipment::find($id);
        $viewData["mode"]      = "edit";

        return view("pages.equipments.form", $viewData);
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
            $equipment = Equipment::find($id);
            $equipment->fill($request->toArray());
            $equipment->update();
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
            EquipmentLocation::where("equipment_id", $id)->delete();
            Equipment::destroy($id);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

}
