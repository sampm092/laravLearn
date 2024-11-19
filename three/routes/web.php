<?php

use App\Http\Controllers\IndexController; //menggunakan kelas IndexController sesuai url
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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
Route::get('/dashboard', [ProfileController::class, 'bookView'])->name('bookView')->middleware('auth');
Route::get('/create', [ProfileController::class, 'createV'])->name('create')->middleware('auth'); //create book
Route::get('{book}/edit', [ProfileController::class, 'edit'])->name('edit')->middleware('auth'); // edit book
Route::get('{book}/detailed', [ProfileController::class, 'detailed'])->name('detailed')->middleware('auth');
Route::put('{book}/', [ProfileController::class, 'update'])->name('update')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth'); //name digunakan pada saat memanggil rute di html

Route::group(['prefix' => 'profile/'], function(){ //Prefix untuk URL
    Route::post('', [ProfileController::class, 'store'])->name('store');
    Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('delete')->middleware('auth'); //delete book
    Route::put('{', [ProfileController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
    Route::delete('/', [ProfileController::class, 'destroyProfile'])->name('destroyProfile')->middleware('auth');
});
Route::get('/about', [IndexController::class, 'about'])->name('about');

Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin.dashboard')->middleware(['auth','admin']);
Route::delete('/admin/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser')->middleware(['auth','admin']);
Route::get('/admin/{user}/detail', [AdminController::class, 'viewUser'])->name('admin.detail')->middleware(['auth','admin']);
Route::get('/admin/{user}/detail/edit', [AdminController::class, 'editPassword'])->name('editPassword')->middleware(['auth','admin']);
Route::put('/admin/{user}/detail/', [AdminController::class, 'updateUser'])->name('updateUser')->middleware(['auth','admin']);
Route::put('/admin/{user}/detail/', [AdminController::class, 'changeRole'])->name('changeRole')->middleware(['auth','admin']);
Route::put('/admin/{user}/detail/', [AdminController::class, 'updateProfileAdmin'])->name('updateProfileAdmin')->middleware(['auth','admin']);