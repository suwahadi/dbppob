<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;

class TransactionController extends Controller
{
    // public function index_old()
    // {
    //     $params = [];
    //     $params["menu"] = "transaction";
    //     $params["subMenu"] = "";
    //     $params["datas"] = Transaction::orderBy('id', 'desc')->paginate(25);
    //     return view('contents.transaction', $params);
    // }

    public function index()
    {
        //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
        //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //FORMAT TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }
        
        $dtrx = Transaction::whereBetween('tanggal', [$start, $end])->get();

        $params = [];
        $params["menu"] = "transaction";
        $params["subMenu"] = "transaction";
        $params["datas"] = Transaction::whereBetween('tanggal', [$start, $end])->get();

        return view('contents.transaction', $params);
    }

    public function exportExcel()
	{
		return Excel::download(new TransactionExport, 'transactions.xlsx');
	}

}