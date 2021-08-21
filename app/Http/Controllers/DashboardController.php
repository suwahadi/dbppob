<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $params = [];
        $params["menu"] = "home";
        $params["subMenu"] = "dashboard";
        $params["products"] = [];


        return view('contents.dashboard', $params);
    }
}
