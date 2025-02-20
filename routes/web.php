<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// non existing route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/user/dashboard', function () {
    return view('userDashboard');
})->middleware(['auth', 'verified','rolemanager:user'])->name('userDashboard');


Route::get('/admin/dashboard', function () {
    return view('adminDashboard');
})->middleware(['auth', 'verified','rolemanager:admin'])->name('adminDashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
