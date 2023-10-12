<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {   

        $user = User::find(auth()->user()->id);
        $title = "Profile";

        return view('user.profile', compact('user', 'title'));
    }
}
