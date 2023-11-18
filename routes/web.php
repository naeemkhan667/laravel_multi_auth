<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyerController;
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
Route::get('/testlib', function(){
$obj = new App\Libraries\Escrow;
return [$obj->create_transaction()];
});
Route::get('/csrf', function(){
    return csrf_token();
});

Route::prefix('/seller')->middleware(['auth', 'isSeller'])->group(function(){
    Route::get('/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');

    Route::get('/product/list', [ProductController::class, 'index'])->name('product.list');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update', [ProductController::class, 'update']);

});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/buyer')->middleware(['auth', 'isBuyer'])->group(function(){
    Route::get('/', [BuyerController::class, 'index'])->name('buyer.products');
    Route::get('/checkout/{id}', [BuyerController::class, 'checkout'])->name('buyer.checkout');
});
//Buyer or public user area
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
