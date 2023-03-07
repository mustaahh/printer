<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\StocksController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Index')->name('home');
    Route::get('/#brands', 'Index')->name('home-brands');
    Route::get('/#best-sellers', 'Index')->name('home-best-sellers');
    Route::get('/#home-products', 'Index')->name('home-products');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/brand/{id}/{slug}', 'BrandPage')->name('brand-page');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('single-product');
    Route::get('/add-to-cart', 'AddToCart')->name('add-to-cart');
    Route::get('/checkout', 'Checkout')->name('checkout');
    Route::get('/user-profile', 'UserProfile')->name('user-profile');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/search', 'Search')->name('search');
        Route::get('/add-to-cart', 'AddToCart')->name('add-to-cart');
        Route::post('/add-product-to-cart/{id}', 'AddProductToCart')->name('add-product-to-cart');
        Route::get('/remove-cart-item/{id}', 'RemoveCartItem' )->name('remove-cart-item');
        Route::get('/shipping-address', 'GetShippingAddress')->name('shipping-address');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('add-shipping-address');
        Route::post('/place-order', 'PlaceOrder')->name('place-order');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/cancel-order', 'CancelOrder')->name('cancel-order');
        Route::get('/user-profile', 'UserProfile')->name('user-profile');
        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pending-orders');
        Route::get('/user-profile/history', 'History')->name('history');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/admin/dashboard', 'Index')->name('admin-dashboard');
    });
    // Route::controller(HomeController::class)->group(function() {
    //     Route::get('/home', 'Index')->name('user-index');
    // });

    Route::controller(BrandsController::class)->group(function(){
        Route::get('/admin/all-brands', 'Index')->name('all-brands');
        Route::get('/admin/add-brand', 'AddBrand')->name('add-brand');
        Route::post('/admin/store-brand', 'StoreBrand')->name('store-brand');
        Route::get('/admin/edit-brand/{id}', 'EditBrand' )->name('edit-brand');
        Route::post('/admin/update-brand', 'UpdateBrand')->name('update-brand');
        Route::get('/admin/delete-brand/{id}', 'DeleteBrand' )->name('delete-brand');
    });

    Route::controller(ProductsController::class)->group(function(){
        Route::get('/admin/all-products', 'Index')->name('all-products');
        Route::get('/admin/add-product', 'AddProduct')->name('add-product');
        Route::post('/admin/store-product', 'StoreProduct')->name('store-product');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('edit-product');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('delete-product');
        Route::post('/admin/update-product', 'UpdateProduct')->name('update-product');
    });

    Route::controller(StocksController::class)->group(function(){
        Route::get('/admin/all-stocks', 'Index')->name('all-stocks');
        Route::get('/admin/add-stocks', 'AddStocks')->name('add-stocks');
        Route::post('/admin/store-stocks', 'StoreStocks')->name('store-stocks');
        Route::get('/admin/edit-stock-image/{id}', 'EditStockImage')->name('edit-stock-image');
        Route::post('/admin/update-stocks-image', 'UpdateStockImage')->name('update-stock-image');
        Route::get('/admin/edit-stock/{id}', 'EditStock')->name('edit-stock');
        Route::post('/admin/update-stocks', 'UpdateStock')->name('update-stock');
        Route::get('/admin/delete-stock/{id}', 'DeleteStock')->name('delete-stock');

    });

    Route::controller(OrdersController::class)->group(function(){
        Route::get('/admin/pending-orders', 'Index')->name('admin-pending-orders');
        Route::post('/admin/confirm-status', 'ConfirmStatus')->name('confirm-status');
        Route::post('/admin/reject-status', 'RejectStatus')->name('reject-status');
        Route::get('/admin/completed-orders', 'CompletedOrders')->name('completed-orders');
        Route::get('/admin/rejected-orders', 'RejectedOrders')->name('rejected-orders');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
