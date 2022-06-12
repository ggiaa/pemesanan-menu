<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = Sale::orderBy('tanggal', 'desc')->get()->all();

        if ($tanggal) {
            foreach ($tanggal as $tgl) {
                $date[] = $tgl->tanggal;
            }

            $arrTanggal = array_values(array_unique($date));

            foreach ($arrTanggal as $tgl) {
                $sales[] = Sale::where('tanggal', $tgl)->orderBy('tanggal', 'desc')->get()->first();
            }
        } else {
            $sales = Sale::get()->all();
        }

        return view('admin.laporan.index', [
            'sales' => $sales,
        ]);
    }

    public function show($date)
    {
        $sales = Sale::where('tanggal', $date)->get()->all();

        return view('admin.laporan.show', [
            'sales' => $sales,
            'date' => $date,
        ]);
    }
}
