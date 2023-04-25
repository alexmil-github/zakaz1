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
    $orders = \App\Models\Order::latest()->take(4)->get();


    return view('welcome', ['orders' => $orders]);
});

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'admin_page'])->name('admin_page')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/category', [\App\Http\Controllers\AdminController::class, 'create_category'])->name('new_category')->middleware('auth'); //Добавление новой категории

Route::get('/category/{id}', [\App\Http\Controllers\AdminController::class, 'delete_category'])->middleware('auth');

Route::resource('order', \App\Http\Controllers\OrderController::class)->middleware('auth');
