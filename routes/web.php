<?php

use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Main;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\CustomProfileController;
use App\Models\Order;
use App\Http\Controllers\PaymentController;
use App\Livewire\UserProfile;
use App\Livewire\OrderDetails;
use App\Livewire\Orders;


// admin
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('filament.admin.pages.admin-dashboard');
    })->name('adminDashboard');
});


// not admin
Route::middleware(['notAdmin'])->group(function () {
    // logged in user
    Route::middleware(['auth',])->group(function () {
        Route::get('/', LandingPage::class)->name('home');
        Route::get('/products', ProductsPage::class)->name('products');
        Route::get('/product/{slug}', ProductDetailPage::class)->name('product.detail');
    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
        //Custom Profile Controller
        // Route::patch('/profile/custom-update', [CustomProfileController::class, 'update'])->name('profile.custom-update');
        // Route::delete('/profile/delete', [CustomProfileController::class, 'destroy'])->name('profile.delete');
    
        Route::get('/liked-product', LikedProduct::class)->name('liked-product');
        Route::get('/cart', CartPage::class)->name('cart');
        Route::get('/checkout', CheckoutPage::class)->name('checkout');
        Route::get('/orders', OrdersPage::class);
    
    
        Route::get('/orders/order-details/{orderId}', OrderDetails::class)->name('order.details');
    
    
        Route::get('/success', SuccessPage::class);
        Route::get('/cancel', CancelPage::class);
    
    
        // Route::get('/order/success/{order}', SuccessPage::class)->name('order.success');
        Route::get('/order/success/{order}', SuccessPage::class)->name('order.success');
    
    
        Route::get('/profile/my-purchases', UserProfile::class)->name('my-purchases'); 
    
    
       Route::get('/profile', UserProfile::class)->name('profile.show');
       


       Route::get('/orders', Orders::class)->name('orders');
      Route::get('/order-details/{order}', OrderDetails::class)->name('order-details');

    });
    
    //guest
    Route::get('/login', LoginPage::class);
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot-password', ForgotPasswordPage::class);
    Route::get('/reset-password', ResetPasswordPage::class);

    Route::get('/', LandingPage::class)->name('home');
    Route::get('/products', ProductsPage::class)->name('products');
    Route::get('/product/{slug}', ProductDetailPage::class)->name('product.detail');
});




require __DIR__ . '/auth.php';


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/users',CreateChat::class)->name('users');
Route::get('/chat{key?}',Main::class)->name('chat');
Route::get('/chat', CreateChat::class)->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
