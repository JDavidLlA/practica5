<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('sitios.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('sitios.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('sitios', SitioController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';