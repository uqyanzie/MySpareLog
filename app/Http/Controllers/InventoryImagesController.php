<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryImages;
use Illuminate\Support\Facades\Redirect;

class InventoryImagesController extends Controller
{
    public function store(Request $request) {
        $inventoryImage = new InventoryImages();
        $inventoryImage->inventory_id = $request->input('inventory_id');

        if($request->allFiles('imageFile')){
            $imageFiles = $request->allFiles('imageFile');
            $images = $imageFiles['imageFile'];
            for($i = 0; $i < sizeof($images); $i++){
                $imageName = (string)(microtime(true) * 10000).'.'.$images[$i]->extension();
                $images[$i]->storeAs('inventories', $imageName);
                $inventoryImages = new InventoryImages();
                $inventoryImages->inventory_id = null;
                $inventoryImages->filename = $imageName;
                $inventoryImages->save();
            }
        }
    }

    public function destroy($id) {
        try{
            $inventoryImage = InventoryImages::find($id);
            $inventoryImage->delete();
        } catch(\Exception $e){
            return Redirect::back()->withErrors(['msg' => 'Gambar gagal dihapus']);
        }

        return Redirect::back()->with('success', 'Gambar berhasil dihapus');
    }
}
