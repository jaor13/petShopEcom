<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Livewire\LandingPage;
use App\Livewire\OrderDetailsPage;
use App\Livewire\OrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\CustomProfileController;


Route::get('/', LandingPage::class)->name('home');
Route::get('/', LandingPage::class)->name('home');
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/product/{slug}', ProductDetailPage::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class);
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot-password', ForgotPasswordPage::class);
    Route::get('/reset-password', ResetPasswordPage::class);
});

//
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('filament.admin.pages.admin-dashboard');
    })->name('adminDashboard');
});

// Route::middleware(['auth', 'verified', 'notAdmin'])->group(function () {
//     Route::get('/', LandingPage::class)->name('home');
// });

// Route::get('/user/dashboard', function () {
//     return view('userDashboard');
// })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Custom Profile Controller
    Route::get('/profile', [CustomProfileController::class, 'show'])->name('profile.show');
    // Route::patch('/profile/custom-update', [CustomProfileController::class, 'update'])->name('profile.custom-update');
    // Route::delete('/profile/delete', [CustomProfileController::class, 'destroy'])->name('profile.delete');


    //new
    Route::get('/checkout', CheckoutPage::class);
    Route::get('/orders', OrdersPage::class);
    Route::get('/orders/{orderID}', OrderDetailsPage::class);

    Route::get('/success', SuccessPage::class);
    Route::get('/cancel', CancelPage::class);
});

require __DIR__ . '/auth.php';
