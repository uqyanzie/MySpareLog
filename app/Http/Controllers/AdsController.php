<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class AdsController extends Controller
{
    public function index()
    {
        $title = "Pasang Iklan Anda";
        return view('inventory.ads', compact('title'));
    }
    
    public function checkout($id){
        $inventory = Inventory::join('users', 'inventories.pic_id', '=', 'users.id')
        ->where('inventories.id', $id)
        ->select('inventories.*', 'users.name as pic_name', 'users.phone as pic_phone')
        ->first();

        $title = "Checkout";

        return view('inventory.checkout', compact('inventory', 'title'));
    }
}
