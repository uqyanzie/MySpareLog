<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function getAllInventories()
    {
        if(!\Auth::id()){
            $inventories = Inventory::orderBy('created_at', 'desc')->get();
        }
        else{
            $inventories = Inventory::where('pic_id', '<>', \Auth::id())->orderBy('created_at', 'desc')->get();
        }

        return view('home', compact('inventories'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $inventories = Inventory::where('nama', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $inventories = NULL;
        }

        return view('inventory.search', compact('inventories'));
    }

    public function getInventoryById($id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return abort(404); // Handle jika inventory dengan ID tertentu tidak ditemukan
        }

        // Lakukan join dengan tabel users
        $pic = User::join('inventories', 'users.id', '=', 'inventories.pic_id')
            ->where('inventories.id', $id)
            ->select('users.id', 'users.name', 'users.phone')
            ->first();

        $auth_user_id = \Auth::id();

        if($pic->id == $auth_user_id){
            return view('inventory.ownerDetail', compact('inventory', 'pic'));
        }
        else{
            return view('inventory.requestDetail', compact('inventory', 'pic'));
        }

    }
}
