<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
//        return view('pages.home.index', $viewData);

        if (Auth::check()) {
            return redirect("tasks");
        } else {
            return view('welcome', $viewData);
        }
    }

}
