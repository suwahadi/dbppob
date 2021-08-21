<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;

class SaldoController extends Controller
{
    public function index()
    {
        $params = [];
        $params["menu"] = "mutations saldo";
        $params["subMenu"] = "mutations saldo";
        $params["datas"] = Saldo::all();

        return view('contents.saldo', $params);
    }
}