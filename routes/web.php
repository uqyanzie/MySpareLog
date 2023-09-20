<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [InventoryController::class, 'getAllInventories']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/ads', [AdsController::class, 'index'])->middleware('auth');
Route::get('/inventories/search', [InventoryController::class, 'search'])->name('inventories.search');

Route::get('/activity', function () {
    return view('activity.index');
})->middleware('auth');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->middleware('auth');

Route::get('/checkout', function () {
    return view('inventory.checkout');
});

Route::get('/inventory/{id}', [InventoryController::class, 'getInventoryById']);