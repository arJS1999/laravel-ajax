<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\TabledataController;
use App\Http\Controllers\CurrencyController;


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
Route::get('/cart', function () {
    return view('menu');
});
Route::get('/carted', function () {
    return view('Tabledata');
});
Route::get('edit',[TabledataController::class,'edit']);

Route::get('/select',[ProductController::class,'index']);
Route::post('/insert',[UpdateController::class,'store']);
Route::get('ajaxdata', [TabledataController::class,'index']);
Route::get('ajaxdata/getdata',[TabledataController::class,'get']);
Route::get('currency',[CurrencyController::class,'index']);
 Route::post('currency',[CurrencyController::class,'exchangeCurrency']);

