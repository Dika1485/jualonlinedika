<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', [ProdukController::class, 'read'])->middleware('auth');
Route::post('/delete', [ProdukController::class, 'delete'])->middleware('auth');
Route::get('/update', [ProdukController::class, 'update'])->middleware('auth');
Route::post('/create', [ProdukController::class, 'create'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
