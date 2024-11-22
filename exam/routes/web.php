<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestController; 

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

Route::get('/questions', [QuestController::class, 'index'])->name('index');

Route::get('/questions/add', [QuestController::class, 'addView'])->name('addView');
Route::get('/questions/{question}/edit/', [QuestController::class, 'editView'])->name('editView');
Route::put('{question}/', [QuestController::class, 'update'])->name('update');
Route::post('/questions/add', [QuestController::class, 'store'])->name('store');
