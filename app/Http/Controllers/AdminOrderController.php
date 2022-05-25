<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->search);
        if ($request->search) {
            $orders = Order::where('no_meja', $request->search)->get();
        } else {
            $orders = Order::latest()->paginate(20);
        }
        return view('admin.pesanan.index', [
            'orders' => $orders,
        ]);
    }

    public function detail(Request $request)
    {
        $orders = Order::where('no_meja', $request->no_meja)->get()->all();

        if ($orders) {
            return view('admin.pesanan.detail', [
                'orders' => $orders,
                'meja' => $request->no_meja,
            ]);
        } else {
            return back()->with('error', 'Pesanan dengan nomer meja ' . $request->no_meja . ' tidak ditemukan@');
        }
    }
}
