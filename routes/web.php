<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;

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

Route::get('/',[App\Http\Controllers\OrderController::class,'index'])->name('order.form');
Route::post('/submit',[App\Http\Controllers\OrderController::class,'submit'])->name('order.submit');

Auth::routes([
    'reset' => false ,
    'verify' => false ,
    'confirm' => false,
]);

//Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');
Route::resource('/dishes',App\Http\Controllers\DishController::class);
Route::get('/orders',[App\Http\Controllers\DishController::class,'order'])->name('kitchen.order');
Route::get('/orders/{order}/approve',[App\Http\Controllers\DishController::class,'approve'])->name('kitchen.approve');
Route::get('/orders/{order}/cancel',[App\Http\Controllers\DishController::class,'cancel'])->name('kitchen.cancel');
Route::get('/orders/{order}/ready',[App\Http\Controllers\DishController::class,'ready'])->name('kitchen.ready');
Route::get('/orders/{order}/serve',[App\Http\Controllers\OrderController::class,'serve'])->name('kitchen.serve');

