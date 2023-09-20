<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {   
        if (\Auth::id() != $id){
             return abort(404);
        }

        $user = User::find($id);
        $title = "Profile";

        return view('user.profile', compact('user', 'title'));
    }
}
