<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Pesanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function show()
    {
        if (session('meja') !== null) {
            return view('user.index', [
                "menus" => Menu::latest()->get(),
                'orders' => Order::where('no_meja', Session('meja'))->get()->all(),

            ]);
        } else {
            return redirect(route('welcome'));
        }
    }

    public function makanan()
    {
        if (session('meja') !== null) {
            return view('user.index', [
                "menus" => Menu::where('jenis', 'makanan')->latest()->get(),
                'orders' => Order::where('no_meja', Session('meja'))->get()->all(),

            ]);
        } else {
            return redirect(route('welcome'));
        }
    }

    public function minuman()
    {
        if (session('meja') !== null) {
            return view('user.index', [
                "menus" => Menu::where('jenis', 'minuman')->latest()->get(),
                'orders' => Order::where('no_meja', Session('meja'))->get()->all(),

            ]);
        } else {
            return redirect(route('welcome'));
        }
    }
}
