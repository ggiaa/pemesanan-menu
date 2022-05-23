<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getMeja(Request $request)
    {
        Session::get('meja');

        $no = $request->nomer_meja;

        Session::put('meja', $no);

        return redirect('home');
    }
}
