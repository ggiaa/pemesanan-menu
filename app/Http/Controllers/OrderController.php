<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function konfirmasi(Request $request)
    {
        $pesan = Session::get('pesanan');
        foreach ($pesan as $p) {
            $validate = [
                "no_meja" => Session::get('meja'),
                "id_menu" => $p['id_menu'],
                "jumlah" => $p['jumlah'],
                "total_harga" => $p['jumlah'] * $p['harga'],
            ];

            Order::create($validate);
        }

        Session::forget('pesanan');

        return redirect('/konfirmasi');
    }

    public function hapus($id_menu)
    {
        $array = Session::get('pesanan');

        unset($array[$id_menu]);

        Session::put('pesanan', $array);

        return back();
    }
}
