<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function konfirmasi()
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

        session()->flush();

        return back();
    }
}
