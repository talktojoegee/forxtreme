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

Route::get('/', [App\Http\Controllers\ProductController::class, 'showProducts'])->name('products');
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'showAddProductForm'])->name('add-product');
Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'storeProduct']);
Route::get('/colors', [App\Http\Controllers\SettingsController::class, 'showColors'])->name('colors');
Route::get('/sizes', [App\Http\Controllers\SettingsController::class, 'showSizes'])->name('sizes');
Route::get('/categories', [App\Http\Controllers\SettingsController::class, 'showCategories'])->name('categories');
