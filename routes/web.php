<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengembalianController;

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard'); // Redirect to dashboard or any other page
    }
    // return view('welcome');
    return redirect('/login'); // Redirect to login page
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/barang', [BarangController::class, 'index'])->middleware('auth');
Route::get('/dashboard/{id}/pesan', [DashboardController::class, 'edit'])->name('dashboard.edit');
Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');

Route::get('/tambahbarang', [BarangController::class, 'create'])->middleware('auth');
Route::post('/tambahbarang', [BarangController::class, 'store'])->middleware('auth');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');


Route::get('/pengembalian', [PengembalianController::class, 'index'])->middleware('auth');



