<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function store(Request $request){
        $request_barang = new RequestModel();
        $request_barang->requester_id = auth()->user()->id;
        $request_barang->tanggal_pengajuan = now();
        $request_barang->nama_pengaju = $request->input('nama_pengaju');
        $request_barang->stok = $request->input('stok');
        $request_barang->alamat = $request->input('alamat');
        $request_barang->inventory_id = $request->input('inventory_id');
        $request_barang->status = 'diajukan';
        try{
            $request_barang->save();
            return redirect()->back()->with('success', 'Berhasil mengajukan barang');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Gagal mengajukan barang');
        }
    }

    public function index(){
        $user = Auth::user();
        $requests = RequestModel::where('requester_id', '=', $user->id)->get();
        $title = "My Requests";

        return view('activity.in', compact('user', 'requests', 'title'));
    }

    public function acceptRequest(){
        $user = Auth::user();
        $requests = RequestModel::where('requester_id', '=', $user->id)->get();
        $title = "My Requests";

        $requests->status = 'disetujui';    

        return view('user.requests', compact('user', 'requests', 'title'));
    }


}
