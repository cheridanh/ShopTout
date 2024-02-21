<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
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

Route::get('admin', function () {
    return view('admin.index');
});

Route::name('admin.')->prefix('admin')->group(function () {
   Route::resource('/', AdminController::class);
   Route::resource('home', AdminController::class);
   Route::resource('articles', ArticleController::class);
   Route::resource('sizes', SizeController::class);
   Route::resource('colors', ColorController::class);
});
