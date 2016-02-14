<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class ReportsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.reports.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(Report::with("reportedBy")->select('report.*'))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $report                     = new Report();
        $report->date               = date("Y-m-d");
        $report->issued_by_username = Auth::user()->username;
        $report->reportedBy         = Auth::user();

        $viewData           = $this->getDefaultViewData();
        $viewData["report"] = $report;
        $viewData["mode"]   = "create";

        return view("pages.reports.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {
            $report = new Report($request->toArray());
            $report->save();
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $viewData           = $this->getDefaultViewData();
        $viewData["report"] = Report::find($id);
        $viewData["mode"]   = "view";

        return view("pages.reports.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData           = $this->getDefaultViewData();
        $viewData["report"] = Report::find($id);
        $viewData["mode"]   = "edit";

        return view("pages.reports.form", $viewData);
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
            $report = Report::find($id);

            if (!$report) {
                return response("Report not found", 404);
            }

            $report->fill($request->toArray());
            $report->save();
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
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
            $report = Report::find($id);

            if (!$report) {
                return response("Report not found", 404);
            }

            $report->delete();
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

}
