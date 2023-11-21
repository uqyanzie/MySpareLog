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

    public function change_session($user_id){
        $user = User::find($user_id);
        session(['current_session' => $user]);
        return redirect()->back();
    }

    public function exit_session(){
        session()->forget('current_session');
        return redirect()->back();
    }
}
