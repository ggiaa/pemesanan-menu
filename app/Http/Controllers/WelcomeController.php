<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Session::get('meja')) {
            return redirect('home');
        }
        return view('welcome');
    }

    public function getMeja(Request $request)
    {
        Session::get('meja');

        $no = $request->validate([
            'nomer_meja' => 'required|numeric',
        ]);

        Session::put('meja', $request->nomer_meja);

        return redirect('home');
    }
}
