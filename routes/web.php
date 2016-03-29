<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get("/logout", "Auth\LoginController@logout");
Auth::routes();

Route::get('/', "HomeController@index");

Route::group(['middleware' => 'auth'], function () {

    Route::post('files/upload', 'FilesController@upload');

    Route::get("tasks/datatable", "TasksController@datatable");
    Route::resource("tasks", "TasksController");

    Route::get("reports/datatable", "ReportsController@datatable");
    Route::resource("reports", "ReportsController");

    Route::get("vehicles/datatable", "VehicleController@datatable");
    Route::resource("vehicles", "VehicleController");

    Route::get("vehicle-reservation/datatable", "VehicleReservationController@datatable");
    Route::resource("vehicle-reservation", "VehicleReservationController");

    Route::get("transportation", "TransportationController@index");

    Route::get("equipments/datatable", "EquipmentsController@datatable");
    Route::post("equipments/borrow", "EquipmentsController@borrowEquipment");
    Route::post("equipments/return", "EquipmentsController@returnEquipment");
    Route::get("equipments/{id}/locations", "EquipmentsController@equipmentLocations");
    Route::get("equipments/{id}/stock-info", "EquipmentsController@equipmentStockInfo");
    Route::resource("equipments", "EquipmentsController");

    Route::get("employee/{username}/tasksToday", "EmployeesController@tasksToday");
    Route::get("employees/datatable", "EmployeesController@datatable");
    Route::resource("employees", "EmployeesController");
});
