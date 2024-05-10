<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\SuperCategoryController;
use App\Models\category;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\bookController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/create-book', [App\Http\Controllers\bookController::class, 'create'])->name('book.create');
// Route::post('/store-book', [App\Http\Controllers\bookController::class, 'store'])->name('book.store');
Route::resource('book', bookController::class);
Route::resource('category', categoryController::class);
Route::resource('super_category', SuperCategoryController::class);
