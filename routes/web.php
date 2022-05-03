<?php

use Illuminate\Support\Facades\Route;
use App\Models\Shoes;
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
    $shoes = Shoes::all();
    return view('home', compact("shoes"));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('is_admin');
Route::resource('/shoes', App\Http\Controllers\ShoesController::class);
Route::get('/destroyShoe/{id}', [\App\Http\Controllers\ShoesController::class, 'destroyShoe'])->name('shoes.destroy');
Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::get('/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroyCategory'])->name('categories.destroy');

Route::get('shoes/cart', [\App\Http\Controllers\ShoesController::class, 'showCart'])->name('cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\ShoesController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [\App\Http\Controllers\ShoesController::class, 'updateCard'])->name('update.cart');
Route::delete('remove-from-cart', [\App\Http\Controllers\ShoesController::class, 'remove'])->name('remove.from.cart');
