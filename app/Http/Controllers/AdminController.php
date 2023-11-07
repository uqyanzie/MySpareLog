<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        $title = "Admin Dashboard";

        return view('admin.index', compact('user', 'title'));
    }
    public function inventories() {
        $user = User::find(Auth::id());
        $inventories = Inventory::orderBy('created_at', 'desc')->get();
        $title = "Inventories";

        return view('admin.inventoryList', compact('user', 'inventories', 'title'));
    }

    public function users(){
        $me = User::find(Auth::id());
        $users = User::get();
        $title = "Users Data";

        return view("admin.userList", compact('me', 'users', 'title'));
    }
}
