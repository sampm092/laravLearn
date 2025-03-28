<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/index', [Controller::class, 'showCustomers']);
Route::get('/list', [Controller::class, 'showLists']);
Route::get('/storePage', [Controller::class, 'storePage']);
Route::post('/store', [Controller::class, 'store'])->name('store');