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
        return view('user.index', [
            "menus" => Menu::latest()->paginate(12)
        ]);
    }

    public function pesan($slug)
    {
        $menu = Menu::where('slug', $slug)->get();
        $pesanan = Session::get('pesanan');
        $pesanan[] = array(
            // 'id_meja' => Session::get('meja'),
            'id_menu' => $menu[0]->id,
            'nama' => $menu[0]->nama,
            'harga' => $menu[0]->harga,
            'jumlah' => 1,
        );

        Session::put('pesanan', $pesanan);

        return redirect()->back()->with($pesanan);
    }
}
