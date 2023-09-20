<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $title = "Pasang Iklan Anda";
        return view('inventory.ads', compact('title'));
    }
}
