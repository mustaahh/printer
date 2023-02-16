<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrdersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard'); 

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard', 'Index')->name('admin-dashboard');
    });
    
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
    });
    
    Route::controller(OrdersController::class)->group(function(){
        Route::get('/admin/completed-orders', 'Index')->name('completed-orders');
        Route::get('/admin/order-confirmations', 'OrderConfirmations')->name('order-confirmations');
    });
    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
