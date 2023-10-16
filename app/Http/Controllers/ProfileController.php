<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;

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
        $title = "My Inventories";

        $inventories = Inventory::where('pic_id', '=', $user->id)->get();

        return view('user.inventories', compact('user', 'title', 'inventories'));
    }
}
