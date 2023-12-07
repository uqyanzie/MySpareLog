<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryImagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminInventoriesController;
use App\Http\Controllers\RequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [InventoryController::class, 'get8Inventories'])->name('home');
Route::get('/all', [InventoryController::class, 'getAllInventories']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/ads', [AdsController::class, 'index'])->middleware('auth');
Route::get('/inventories/search', [InventoryController::class, 'search'])->name('inventories.search');
Route::post('/inventories/store', [InventoryController::class, 'store'])->name('inventories.store');
Route::get('/inventory/{id}', [InventoryController::class, 'getInventoryById']);
Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])->middleware('auth')->name('inventories.edit');
Route::patch('/inventory/remove/{id}', [InventoryController::class, 'remove'])->middleware('auth')->name('inventories.remove');
Route::patch('/inventory/update/{id}', [InventoryController::class, 'update'])->name('inventories.update')->middleware('auth');
Route::patch('/inventory/lelang/{id}', [InventoryController::class, 'lelang'])->name('inventories.lelang')->middleware('auth');
Route::delete('/inventory-image/delete/{id}', [InventoryImagesController::class, 'destroy'])->middleware('auth');

Route::get('/my-requests', [RequestController::class, 'index']);
Route::get('/my-requests/{id}', [RequestController::class, 'myrequest_info']);
Route::post('/request', [RequestController::class, 'store']);

Route::get('/activity', function () {
    return view('activity.index');
})->middleware('auth');

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/my-inventories', [ProfileController::class, 'userInventories'])->middleware('auth');
Route::get('/my-inventories/download-excel', [ProfileController::class, 'downloadExcel'])->name('my-inventories.download-excel')->middleware('auth');
Route::get('/my-inventories/lelang', [ProfileController::class, 'lelangInventories'])->middleware('auth');
Route::get('/my-inventories/junk', [ProfileController::class, 'junkInventories'])->middleware('auth');

Route::get('/checkout/{id}', [AdsController::class, 'checkout'])->middleware('auth');

Route::post('/admin/change-session/{id}', [AdminController::class, 'change_session'])->name('admin.change_session');
Route::get('/admin/exit-session', [AdminController::class, 'exit_session'])->name('admin.exit_session');

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/inventories', [AdminController::class, 'inventories']);
Route::get('/admin/users', [AdminUserController::class, 'index']);

Route::get('/admin/create-user', [AdminUserController::class, 'create']);
Route::post('/admin/user/store', [AdminUserController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
Route::patch('/admin/user/update/{id}', [AdminUserController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.user.delete');

Route::get('/admin/users/download-excel', [AdminUserController::class, 'downloadExcel'])->name('admin.users.download-excel');
Route::get('/admin/inventories/download-excel', [AdminInventoriesController::class, 'downloadExcel'])->name('admin.inventories.download-excel');

Route::get('/ads/create/{type_id}', [InventoryController::class, 'create'])->middleware('auth');
Route::get('/inbox', function() { 
    return view("activity.inbox"); 
});