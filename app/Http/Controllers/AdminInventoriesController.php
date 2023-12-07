<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportInventory;


class AdminInventoriesController extends Controller
{

    use AuthorizesRequests;
    public function index(){
        $this->authorize('admin');
        $inventories = Inventory::orderBy('created_at', 'desc')->get();
        $title = "Inventories";

        return view('admin.inventoryList', compact('inventories', 'title'));
    }

    public function create(){
        $this->authorize('admin');
        if (session('current_session') == null) {
            return redirect()->route('admin.users');
        }
        
        return view('inventory.createAds');
    }

    public function store(){
        
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }

    public function downloadExcel(){
        return Excel::download(new ExportInventory, now().'all-inventories'.'.xlsx');
    }
}
