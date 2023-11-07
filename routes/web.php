<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [InventoryController::class, 'get8Inventories']);
Route::get('/all', [InventoryController::class, 'getAllInventories']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/ads', [AdsController::class, 'index'])->middleware('auth');
Route::get('/inventories/search', [InventoryController::class, 'search'])->name('inventories.search');
Route::post('/inventories/store', [InventoryController::class, 'store'])->name('inventories.store');

Route::get('/requests', [RequestController::class, 'index']);
Route::get('/requests/{id}', [RequestController::class, 'myrequest_info']);
Route::post('/request', [RequestController::class, 'store']);

Route::get('/activity', function () {
    return view('activity.index');
})->middleware('auth');

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/my-inventories', [ProfileController::class, 'userInventories'])->middleware('auth');

Route::get('/checkout/{id}', [AdsController::class, 'checkout'])->middleware('auth');

Route::get('/inventory/{id}', [InventoryController::class, 'getInventoryById']);

Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/inventories', [AdminController::class, 'inventories']);
Route::get('admin/users', [AdminController::class, 'users']);

Route::get('ads/create/{type_id}', [InventoryController::class, 'create']);