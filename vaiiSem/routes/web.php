<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalogue', [App\Http\Controllers\CatalogueController::class, 'index'])->name('catalogue');
Route::get('/search', [App\Http\Controllers\Admin\ProductController::class, 'search']);


 Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index'])->name('dashboard');
    Route::get('products', 'App\Http\Controllers\Admin\ProductController@index');
    Route::get('add-product', 'App\Http\Controllers\Admin\ProductController@add');
    Route::post('insert-product','App\Http\Controllers\Admin\ProductController@insert');
    Route::get('edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'edit']);
    Route::put('update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('updateProduct');
    Route::get('delete-category/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('deleteProduct');
});
