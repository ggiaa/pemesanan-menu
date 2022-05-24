<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function show()
    {
        if (session('meja') !== null) {
            return view('user.index', [
                "menus" => Menu::latest()->get(),
                'orders' => Order::where('no_meja', Session('meja'))->get(),

            ]);
        } else {
            return view('welcome');
        }
    }

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

        Session::put('pesanan', $pesanan);

        return redirect()->back()->with($pesanan);
    }
}
