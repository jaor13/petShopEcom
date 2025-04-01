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
use App\Livewire\LikedProduct;
use App\Livewire\OrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\CustomProfileController;
use App\Models\Order;
use App\Http\Controllers\PaymentController;
use App\Livewire\UserProfile;
use App\Livewire\OrderDetails;
use App\Livewire\Orders;
use Namu\WireChat\Livewire\Pages\Chats;
use Namu\WireChat\Livewire\Pages\Chat;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\InvoiceController;


// admin
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('filament.admin.pages.admin-dashboard');
    })->name('adminDashboard');

    Route::get('/print-invoice/{id}',[InvoiceController::class,'printPurchaseInvoice'])->name('print-invoice');
    Route::get('/download-invoice/{id}', [InvoiceController::class, 'downloadPurchaseInvoice'])->name('download-invoice');

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

      Route::get('/chats', Chats::class)->name('chats');
      Route::get('/chats/{conversation}', Chat::class)->middleware('belongsToConversation')->name('chat');

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
