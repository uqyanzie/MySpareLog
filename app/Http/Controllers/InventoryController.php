<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryImages;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;


class InventoryController extends Controller
{
    public function getAllInventories()
    {
        if(!Auth::id()){
            $inventories = Inventory::orderBy('created_at', 'desc')->get();
        }
        else{
            $inventories = Inventory::where('status', '=', 'tersedia')->orderBy('created_at', 'desc')->get();
        }

        $showMore = true;

        return view('home', compact('inventories', 'showMore'));
    }

    public function get8Inventories()
    {
        if(!Auth::id()){
            $inventories = Inventory::orderBy('created_at', 'desc')->take(8)->get();
        }
        else{
            $inventories = Inventory::where('status', '=', 'tersedia' )->orderBy('created_at', 'desc')->take(8)->get();
        }

        $showMore = false;

        return view('home', compact('inventories', 'showMore'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $types = Type::all();

        if ($search) {
            $inventories = Inventory::where('nama', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $inventories = Inventory::orderBy('created_at', 'desc')->get();
        }

        return view('inventory.search', compact('inventories', 'types'));
    }

    public function getInventoryById($id)
    {
        $inventory = Inventory::join('users', 'inventories.pic_id', '=', 'users.id')
            ->where('inventories.id', $id)
            ->select('inventories.*', 'users.name as pic_name', 'users.phone as pic_phone')
            ->first();
        
        $inventoryImages = InventoryImages::where('inventory_id', $id)->get();

        if (!$inventory) {
            return abort(404); // Handle jika inventory dengan ID tertentu tidak ditemukan
        }

        $auth_user_id = Auth::id();

        if($inventory->pic_id == $auth_user_id){
            return view('inventory.ownerDetail', compact('inventory', 'inventoryImages'));
        }
        else{
            return view('inventory.requestDetail', compact('inventory', 'inventoryImages'));
        }
    }

    public function create($id){
        $type = Type::find($id);
        $title = "Pasang Iklan Anda";

        $pic_data = Auth::user()->role == 'admin' ? session('current_session') : Auth::user();

        return view('inventory.createAds', compact('type', 'title', 'pic_data'));
    }

    public function store(Request $request){
        try{
            $this->validate($request, [
                'nama' => 'required',
                'lokasi' => 'required',
                'stok' => 'required|numeric',
                'nama_pic' => 'required',
                'telp_pic' => 'required|numeric',
            ]);
            $inventory = new Inventory();
            $inventory->nama = $request->input('nama');
            $inventory->nama_pic = $request->input('nama_pic');
            $inventory->telp_pic = $request->input('telp_pic');
            $inventory->type_id = $request->input('type_id');
            $inventory->stok = $request->input('stok');
            $inventory->deskripsi = $request->input('deskripsi');
            $inventory->lokasi = $request->input('lokasi');
            if(auth()->user()->role == 'admin'){
                $current_session = session()->get("current_session");
                $inventory->pic_id = $current_session->id;
            }
            else{
                $inventory->pic_id = Auth::id();
            }

            if($request->file('image1') || $request->file('image2') || $request->file('image3') || $request->file('image4')){
                $image = $request->file('image1') ;
                $imageName = time().'_'.'1'.'.'.$image->extension();
                $inventory->foto = $imageName;
            }
            
            $inventory->save();
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        for($i = 0; $i < 4; $i++){
            try{
                if($request->file('image'.($i+1))){
                    $image1 = $request->file('image'.($i+1));
                    $imageName = time().'_'.$i.'.'.$image1->extension();
                    $image1->storeAs('inventories', $imageName);
                    $inventoryImages = new InventoryImages();
                    $inventoryImages->inventory_id = $inventory->id;
                    $inventoryImages->filename = $imageName;
                    $inventoryImages->save();
                }
            }catch(\Exception $e){
                return $e;
            }
        }
        
        return redirect('/')->with('success', 'Inventory berhasil ditambahkan');
    }

    public function edit($id){
        $inventory = Inventory::find($id);

        if(!$inventory){
            return abort(404);
        }

        $title = "Edit Iklan";
        $type = Type::find($inventory->type_id);
        $pic_data = Auth::user()->role == 'admin' ? session('current_session') : Auth::user();
        $inventoryImages = InventoryImages::where('inventory_id', $id)->get();

        return view('inventory.editAds', compact('inventory', 'type', 'pic_data', 'title', 'inventoryImages'));
    }

    public function update(Request $request, $id){
        $inventory = Inventory::find($id);
        $inventoryImages = InventoryImages::where('inventory_id', $id)->get();

        if(!$inventory){
            return abort(404);
        }

        try{
            $this->validate($request, [
                'nama' => 'required',
                'lokasi' => 'required',
                'stok' => 'required|numeric',
                'nama_pic' => 'required',
                'telp_pic' => 'required|numeric',
            ]);
            
            $inventory->nama = $request->input('nama');
            $inventory->nama_pic = $request->input('nama_pic');
            $inventory->telp_pic = $request->input('telp_pic');
            $inventory->type_id = $request->input('type_id');
            $inventory->stok = $request->input('stok');
            $inventory->deskripsi = $request->input('deskripsi');
            $inventory->lokasi = $request->input('lokasi');
            if(auth()->user()->role == 'admin'){
                $current_session = session()->get("current_session");
                $inventory->pic_id = $current_session->id;
            }
            else{
                $inventory->pic_id = Auth::id();
            }
    
            if( count($inventoryImages) < 1 || $request->file('image1') || $request->file('image2') || $request->file('image3') || $request->file('image4')){
                $image = $request->file('image1') ;
                $imageName = time().'_'.'1'.'.'.$image->extension();
                $inventory->foto = $imageName;
            }
    
            $inventory->save();
        }catch(\Exception $e){
            
            return $e;
        }

        for($i = 0; $i < 4; $i++){
            try{
                if($request->file('image'.($i+1))){
                    $image1 = $request->file('image'.($i+1));
                    $imageName = time().'_'.$i.'.'.$image1->extension();
                    $image1->storeAs('inventories', $imageName);
                    $inventoryImages = new InventoryImages();
                    $inventoryImages->inventory_id = $inventory->id;
                    $inventoryImages->filename = $imageName;
                    $inventoryImages->save();
                }
            }catch(\Exception $e){
                return $e;
            }
        }

        return redirect('/')->with('success', 'Barang berhasil diperbarui');
    }

    public function remove($id){
        $inventory = Inventory::find($id);

        if(!$inventory){
            return abort(404);
        }

        $inventory->status = 'dihapus';

        $inventory->save();

        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}
