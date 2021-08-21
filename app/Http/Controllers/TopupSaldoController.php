<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopUpSaldo;
use DB;

class TopupSaldoController extends Controller
{
    public function index()
    {
        $params = [];
        $params["menu"] = "top up saldo";
        $params["subMenu"] = "top up saldo";
        $params["datas"] = TopUpSaldo::orderBy('id', 'desc')->paginate(25);

        return view('contents.topupsaldo_index', $params);
    }

    public function add()
    {
        $params = [];
        $params["menu"] = "create top up saldo";
        $params["subMenu"] = "create top up saldo";
        $params["datas"] = TopUpSaldo::all();

        return view('contents.topupsaldo_add', $params);
    }
    
    public function create(Request $request)
    {
        $temp = [
            "id" => DB::table('tbltopupsaldo')->max("id") + 1,
            "idUser" => $request->post("iduser"),
            "nominal" => $request->post("nominal"),
            "norek" => $request->post("norek"),
            "bank" => $request->post("bank"),
            "atas_nama" => $request->post("an"),
        ];
        if(DB::table('tbltopupsaldo')->insert($temp)){
            return redirect()->route('topupsaldo')->with("success","Topup Saldo create successfully!");
        }
    }

}