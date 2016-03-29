<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaTask;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class TasksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.tasks.index", $viewData);
    }

    public function datatable() {
//        return AreaTask::with("assignedTo")->get();
        return Datatables::of(AreaTask::with("assignedTo")->select('area_task.*'))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData         = $this->getDefaultFormViewData();
        $viewData["task"] = new AreaTask();
        $viewData["mode"] = "create";

        return view("pages.tasks.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $areaTask = new AreaTask($request->toArray());
            $areaTask->save();

            return $areaTask;
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

        $viewData         = $this->getDefaultFormViewData();
        $viewData["task"] = AreaTask::find($id);
        $viewData["mode"] = "view";

        return view("pages.tasks.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData         = $this->getDefaultFormViewData();
        $viewData["task"] = AreaTask::find($id);
        $viewData["mode"] = "edit";

        return view("pages.tasks.form", $viewData);
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
            $areaTask = AreaTask::find($id);

            if ($areaTask) {
                $areaTask->fill($request->toArray());
                $areaTask->save();
                return $areaTask;
            } else {
                return response("Task not found", 404);
            }
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
            AreaTask::destroy($id);
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    protected function getDefaultFormViewData() {
        $viewData = $this->getDefaultViewData();

        $viewData["employees"]  = User::Active()->Employee()->get();
        $viewData["areas"]      = Area::all();
        $viewData["tasks"]      = Task::all();
        $viewData["statusList"] = Task::$statusList;

        return $viewData;
    }

}
