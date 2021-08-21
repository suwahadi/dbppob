<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        
        $params = [];
        $params["menu"] = "products";
        $params["subMenu"] = "";
        $params["types"] = Product::get()->groupBy("tipe");
        $params["datas"] = Product::paginate(25);

        return view('contents.product', $params);
    }

    public function getCardProduct(Request $request)
    {
        $params["data"] = Product::where("tipe", $request->get("type"))->get()->groupBy("provider");

        return view('contents.tambahan.card-produk', $params);
    }

    public function add(Request $request)
    {
        $temp = [
            "kode" => $request->post("kode"),
            //"tekskirim" => $request->post("tekskirim"),
            //"hargabeli" => $request->post("hargabeli"), 
            "hargajual" => $request->post("hargajual"), 
            "provider" => $request->post("provider"), 
            //"jenis " => $request->post("jenis"), 
            //"keterangan  " => $request->post("keterangan"), 
            "nominal" => $request->post("nominal"), 
            //"nama_supplier" => $request->post("nama_supplier"), 
            "gangguan" => $request->post("gangguan"), 
            //"tipe" => $request->post("tipe"), 
            //"img_produk " => $request->post("img_produk"), 
            //"group_tipe" => $request->post("group_tipe"), 
            //"diskon" => $request->post("diskon"), 
            //"biaya_admin" => $request->post("biaya_admin"),
        ];

        if(DB::table('tbl_ppob_produk')->insert($temp)){
            return redirect('/administrator/product');
        }
    }

    public function edit(Request $request)
    {
        DB::table('tbl_ppob_produk')->where('kode', $request->post("kodeProduk"))->update([
            "hargajual" => $request->post("harga")
        ]);

        return redirect()->back();
    }
}