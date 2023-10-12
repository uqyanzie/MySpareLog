<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;

class AdminController extends Controller
{
    public function inventories() {
        $inventories = Inventory::where('pic_id', '<>', \Auth::id())->orderBy('created_at', 'desc')->get();

        return view('admin.inventoryList', compact('inventories'));
    }

    public function users(){
        $users = User::get();

        return view("admin.userList". compact('users'));
    }
}
