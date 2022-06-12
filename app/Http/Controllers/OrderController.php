<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function pesan(Request $request, $slug)
    {
        $menu = Menu::where('slug', $slug)->get();

        $pesanan = Session::get('pesanan');
        $pesanan[$menu[0]->id] = array(
            'id_menu' => $menu[0]->id,
            'nama' => $menu[0]->nama,
            'harga' => $menu[0]->harga,
            'jumlah' => $request->jumlah,
        );

        try {
            foreach ($pesanan as $pesan => $val) {
                //kalau menu ini sama dengan menu yang telah ada di session
                if ($val['id_menu'] == $menu[0]->id) {
                    $data = Session::get('pesanan');
                    $data[$menu[0]->id]['jumlah'] += $request->jumlah;
                    Session::put('pesanan', $data);
                }
            }
        } catch (Exception) {
            Session::put('pesanan', $pesanan);
        }

        return redirect()->back()->with($pesanan);
    }

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

        return redirect('struk/' . Session::get('meja'))->with('success', 'berhasil');
    }

    public function hapus($id_menu)
    {
        $array = Session::get('pesanan');

        unset($array[$id_menu]);

        Session::put('pesanan', $array);

        return back();
    }
}
