<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ConfirmController extends Controller
{
    public function index($no)
    {
        return view('user.confirm', [
            'orders' => Order::where('no_meja', $no)->get(),
        ]);
    }

    public function bayar($no_meja)
    {
        $orderan = Order::where('no_meja', $no_meja)->get()->all();

        foreach ($orderan as $order) {
            $validate = [
                'menu_id' => $order->id_menu,
                'jumlah' => $order->jumlah,
                'total_harga' => $order->total_harga,
            ];

            Sale::create($validate);
        }

        DB::table('orders')->where(['no_meja' => Session::get('meja')])->delete();

        return view('welcome');
    }
}
