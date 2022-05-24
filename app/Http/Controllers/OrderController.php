<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            // get spesifik pesanan dari session
            $menu = Order::where('no_meja', Session::get('meja'))->where('id_menu', $p['id_menu'])->first();

            // update jumlah jika pesanan telah ada, buat baru kalo belum ada pesanan tersebut
            if ($menu !== null) {
                DB::table('orders')->where(['no_meja' => Session::get('meja'), 'id_menu' => $p['id_menu']])->update(['jumlah' => $menu->jumlah + $p['jumlah']]);
            } else {
                Order::create($validate);
            }
        }

        Session::forget('pesanan');

        return redirect('/home/struk/' . Session::get('meja'));
    }

    public function hapus($id_menu)
    {
        $array = Session::get('pesanan');

        unset($array[$id_menu]);

        Session::put('pesanan', $array);

        return back();
    }
}
