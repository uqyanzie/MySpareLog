<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //
    public function change_session($id){
        session_start();

        $_SESSION['user_id'] = $id;

        return redirect()->back()->with('success', 'successfully changed into user session');
    }

    public function destroy_session(){
        unset($_SESSION['user_id']);
        return redirect()->back()->with('success', 'successfully deleted user session');
    }
}
