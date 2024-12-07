<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [BookController::class, 'index']);
Route::get('/shopping-cart', [BookController::class, 'bookCart'])->name('shopping.cart');
Route::get('/book/{id}', [BookController::class, 'addBooktoCart'])->name('addbook.to.cart');
Route::patch('/update-shopping-cart', [BookController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [BookController::class, 'deleteProduct'])->name('delete.cart.product');
Route::get('/checkout', [BookController::class, 'checkout'])->name('shopping.checkout');



Route::get('/addproduct/{id}', [BookController::class, 'addProduct'])->name('addProduct.to.cart');
Route::get('/minusproduct/{id}', [BookController::class, 'minusProduct'])->name('minusProduct.to.cart');



// Route::get('/placeorder', 'App\Http\Controllers\StripeController@checkout')->name('placeorder');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
//Route::get('/productorder', [StripeController::class, 'productOrder']);
