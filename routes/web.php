<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('is_admin');
Route::resource('/shoes', App\Http\Controllers\ShoesController::class);
// Route::get('/home', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::get('/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroyCategory'])->name('categories.destroy');
