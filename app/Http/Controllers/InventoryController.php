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
        if(!\Auth::id()){
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
        if(!\Auth::id()){
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

        $auth_user_id = \Auth::id();

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

        $pic_data = \Auth::user();

        return view('inventory.createAds', compact('type', 'title', 'pic_data'));
    }

    public function store(Request $request){
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
        $inventory->pic_id = \Auth::id();

        if(sizeOf($request->allFiles('imageFile')) > 0){
            $images = $request->file('imageFile');
            $imageName = time().'.'.$images[0]->extension();
            $images[0]->storeAs('inventories', $imageName);
            $inventory->foto = $imageName;
        }

        $inventory->save();

        if($request->allFiles('imageFile')){
            $imageFiles = $request->allFiles('imageFile');
            $images = $imageFiles['imageFile'];
            for($i = 0; $i < sizeof($images); $i++){
                $imageName = time().'_'.($i+1).'.'.$images[$i]->extension();
                $images[$i]->storeAs('inventories', $imageName);
                $inventoryImages = new InventoryImages();
                $inventoryImages->inventory_id = $inventory->id;
                $inventoryImages->filename = $imageName;
                $inventoryImages->save();
            }
        }

        return redirect('/')->with('success', 'Inventory berhasil ditambahkan');
    }

    public function edit($id){
        $inventory = Inventory::find($id);

        if(!$inventory){
            return abort(404);
        }

        return view('inventory.edit', compact('inventory'));
    }

    public function destroy($id){
        $inventory = Inventory::find($id);

        if(!$inventory){
            return abort(404);
        }

        $inventory->delete();

        return redirect('/')->with('success', 'Barang berhasil dihapus');
    }
}
