<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;


Route::get('/', function () {
    return view('landing');
})->name('landing');




Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('filament.admin.pages.admin-dashboard'); 
    })->name('adminDashboard');
});

Route::middleware(['auth', 'verified', 'notAdmin'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('userDashboard');
    })->name('dashboard');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
