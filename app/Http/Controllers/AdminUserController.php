<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;

class AdminUserController extends Controller
{
    
    public function index(){
        $me = User::find(Auth::id());
        $users = User::get();
        $title = "Users Data";

        return view("admin.userList", compact('me', 'users', 'title'));
    }

    public function create(){
        return view('admin.createUser');
    }

    public function store(Request $request){
        
        try{
            $this->validate($request, [
                'role' => 'required|in:user,admin'
            ]);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        try{
            if($request->input('role') == 'user'){
                $this->validate($request, [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' => 'required',
                    'phone' => 'numeric',
                    'divisi' => 'required|in:Teknik,Operasional,Teknologi Informasi',
                    'cabang' => 'required|in:Terminal Nilam,Terminal Jamrud,Pelindo Subreg Jawa'
                ]);
            }
            else{
                $this->validate($request, [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' => 'required',
                    'phone' => 'numeric',
                ]);
            }

            $newUser = new User();
            $newUser->email = $request->input('email');
            $newUser->name = $request->input('name');
            $newUser->username = $request->input('username');
            $newUser->password = Hash::make($request->input('password'));
            $newUser->role = $request->input('role');
            $newUser->phone = $request->input('phone');
            $newUser->divisi = $request->input('divisi') || null;
            $newUser->cabang = $request->input('cabang') || null;
            $newUser->status = "aktif";
            $newUser->created_at = now();
            $newUser->updated_at = now();

            $newUser->save();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        return redirect('/admin/users')->with('success', 'Sukses menambahkan user');
    }

    public function edit($id){
        $user = User::find($id);

        return view('admin.editUser', compact('user'));
    }

    public function update($id, Request $request){
        $user = User::find($id);

        try{
            $this->validate($request, [
                'role' => 'required|in:user,admin'
            ]);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        try{
            if($request->input('role') == 'user'){
                $this->validate($request, [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' => 'required',
                    'phone' => 'numeric',
                    'divisi' => 'required|in:Teknik,Operasional,Teknologi Informasi',
                    'cabang' => 'required|in:Terminal Nilam,Terminal Jamrud,Pelindo Subreg Jawa'
                ]);
            }
            else{
                $this->validate($request, [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' => 'required',
                    'phone' => 'numeric',
                ]);
            }

            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->password =  $user->password == $request->input('password')? $user->password : Hash::make($request->input('password'));
            $user->role = $request->input('role');
            $user->phone = $request->input('phone');
            $user->divisi = $request->input('divisi') || null;
            $user->cabang = $request->input('cabang') || null;
            $user->status = $request->input('status')? 'aktif' : 'nonaktif';
            $user->updated_at = now();

            $user->save();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        return redirect('/admin/users')->with('success', 'Sukses memperbarui user');
    }

    public function destroy($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/admin/users')->with('success', 'Sukses menghapus user');
    }

    public function downloadExcel(){
        return Excel::download(new ExportUser, now().'-users.xlsx');
    }
}
