<?php

use App\Http\Controllers\IndexController; //menggunakan kelas IndexController sesuai url
use App\Http\Controllers\ProfileController;
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

Route::get('/', [IndexController::class, 'index']); //URL '/' pada browser mengembalikan function index pada kelas IndexController
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/create', [ProfileController::class, 'createV'])->name('create');
Route::post('/profile',[ProfileController::class, 'store'])->name('store');