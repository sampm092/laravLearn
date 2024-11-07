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

Route::get('/', [IndexController::class, 'index'])->name('welcome'); //URL '/' pada browser mengembalikan function index pada kelas IndexController
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::post('/login', [IndexController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [IndexController::class, 'logout'])->name('logout');
Route::get('/regist', [IndexController::class, 'regist'])->name('regist');
Route::post('/regist', [IndexController::class, 'registore'])->name('registore');
Route::get('/about', [ProfileController::class, 'about'])->name('about');
Route::get('/dashboard', [ProfileController::class, 'bookView'])->name('bookView');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile'); //name digunakan pada saat memanggil rute di html
Route::get('/create', [ProfileController::class, 'createV'])->name('create'); //create book
Route::get('{book}/edit', [ProfileController::class, 'edit'])->name('edit'); // edit book
Route::get('{book}/detailed', [ProfileController::class, 'detailed'])->name('detailed');
Route::post('/profile', [ProfileController::class, 'store'])->name('store');
Route::put('{book}/', [ProfileController::class, 'update'])->name('update');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('delete'); //delete book
Route::put('{/profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::get('/about', [IndexController::class,'about'])->name('about');