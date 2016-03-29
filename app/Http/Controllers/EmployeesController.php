<?php

namespace App\Http\Controllers;

use App\Models\AreaTask;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class EmployeesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.employees.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(User::Employee())->make(true);
    }

    //
    // <editor-fold defaultstate="collapsed" desc="API">

    public function tasksToday($username) {
        return AreaTask::EmployeeTasksToday($username)->get();
    }

    // </editor-fold>

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $viewData = $this->getDefaultViewData();

        $viewData["employee"] = new User();
        $viewData["mode"]     = "create";

        return view("pages.employees.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {

            $employee            = new User($request->toArray());
            $employee->role_code = "employee";

            $employee->save();
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

        $viewData["employee"] = User::find($id);
        $viewData["mode"]     = "edit";

        return view("pages.employees.form", $viewData);
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

            $employee            = User::find($id);
            $employee->fill($request->toArray());
            $employee->role_code = "employee";

            $employee->save();
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
