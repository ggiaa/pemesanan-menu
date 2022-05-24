<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function index($no)
    {
        return view('user.confirm', [
            'orders' => Order::where('no_meja', $no)->get(),
        ]);
    }
}
