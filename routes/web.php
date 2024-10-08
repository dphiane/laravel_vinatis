<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WineController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::resource('region', RegionController::class);
});

Route::resource('vins',WineController::class)->middleware(AdminMiddleware::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
