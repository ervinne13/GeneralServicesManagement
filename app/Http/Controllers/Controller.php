<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected function getDefaultViewData() {
        $viewData = [
            "bodyClass" => "layout-top-nav skin-red",
            "header"    => 'layouts.parts.top-nav-header'
        ];

        if (Auth::check() && Auth::user()->role_code == "emp_hk") {
            $viewData["views"] = [
                "housekeeping"   => "Housekeeping",
                "equipments"     => "Equipments",
                "reports"        => "Reports",
                "transportation" => "Transportation",
            ];
        } else if (Auth::check() && Auth::user()->role_code == "emp_sec") {
            $viewData["views"] = [
                "security"       => "Security",
                "equipments"     => "Equipments",
                "reports"        => "Reports",
                "transportation" => "Transportation",
            ];
        } else if (Auth::check() && Auth::user()->role_code == "admin") {
            $viewData["views"] = [
                "tasks"          => "Task",
                "security"       => "Security",
                "housekeeping"   => "Housekeeping",
                "equipments"     => "Equipments",
                "reports"        => "Reports",
                "transportation" => "Transportation",
            ];
        }

        return $viewData;
    }

}
