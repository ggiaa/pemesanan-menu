<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sale;
use Carbon\Carbon;
use Exception;
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
                'sub_harga' => $order->total_harga,
                'total_semua' => $order->total_harga,
                'tanggal' => $order->created_at->toDateString(),
            ];

            // cek apakah orderan ini telah ada di tabel penjualan dengan hari yang sama
            $datawaktusama = Sale::where('tanggal', $order->created_at->toDateString())->get()->first();

            $datamenusama = Sale::where('menu_id', $order->id_menu)->where('tanggal', $order->created_at->toDateString())->get()->first();
            if ($datawaktusama != null) {

                $totalsemua = $datawaktusama->total_semua;

                if ($datamenusama != null) {
                    $totalsemua += $order->total_harga;
                    DB::table('sales')->where(['menu_id' => $order->id_menu, 'tanggal' => $order->created_at->toDateString()])->update(['jumlah' => $datamenusama->jumlah + $order->jumlah, 'sub_harga' => $datamenusama->sub_harga + $order->total_harga]);
                    DB::table('sales')->where(['tanggal' => $order->created_at->toDateString()])->update(['total_semua' => $totalsemua]);
                } else {
                    Sale::create($validate);
                    $totalsemua += $order->total_harga;
                    DB::table('sales')->where(['tanggal' => $order->created_at->toDateString()])->update(['total_semua' => $totalsemua]);
                }
            } else {
                Sale::create($validate);
            }
        }

        DB::table('orders')->where(['no_meja' => Session::get('meja')])->delete();

        return redirect(route('welcome'));
    }
}
