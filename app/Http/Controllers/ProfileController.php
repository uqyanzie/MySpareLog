<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Exports\ExportInventory;
use Maatwebsite\Excel\Facades\Excel;

class ProfileController extends Controller
{
    public function show()
    {   

        $user = User::find(auth()->user()->id);
        $title = "Profile";

        return view('user.profile', compact('user', 'title'));
    }

    public function userInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Barang/Iklan Saya";

        $inventories = Inventory::where('pic_id', '=', $user->id)->get();

        return view('user.inventories', compact('user', 'title', 'inventories'));
    }

    public function junkInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Removed";

        $inventories = Inventory::where('pic_id', '=', $user->id)->where('status', '=', 'dihapus')->get();

        return view('user.junk', compact('user', 'title', 'inventories'));
    }

    public function lelangInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Barang yang dilelang";

        $inventories = Inventory::where('pic_id', '=', $user->id)->where('status', '=', 'lelang')->get();

        return view('user.lelang', compact('user', 'title', 'inventories'));
    }

    public function downloadExcel(){
        $user = User::find(auth()->user()->id);
        return Excel::download(new ExportInventory, now().'-'.$user->username.'`s-inventories-'.'.xlsx');
    }
}
