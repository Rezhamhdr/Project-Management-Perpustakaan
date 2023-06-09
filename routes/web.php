<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

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

Route::resource('bukus', BukuController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/buku', function () {
    return view('buku');
})->middleware(['auth', 'verified'])->name('buku');

Route::middleware('auth')->group(function () {
    Route::get('/bukus', [BukuController::class, 'edit'])->name('Buku.edit');
    Route::patch('/bukus', [BukuController::class, 'update'])->name('Buku.update');
    Route::delete('/bukus', [BukuController::class, 'destroy'])->name('Buku.destroy');
});

require __DIR__.'/auth.php';
