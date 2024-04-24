<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\App\ArticleAppController;
use App\Http\Controllers\App\HomeController;
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

// Interfaces for app
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ArticleAppController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}-{article}', [ArticleAppController::class, 'show'])->name('articles.show')->where([
    'article' => '[0-9]+',
    'slug' => '[0-9a-zA-Z\-]+',
]);
Route::get('/images/{path}', [ImageController::class, 'show'])->where('path', '.*');

// Command users
Route::post('/articles/{article}/command', [ArticleAppController::class, 'command'])->name('articles.command')->where([
    'article' => '[0-9]+',
]);;

// Authentication to administration
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// interfaces for administration !!!
// Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
Route::prefix('admin')->name('admin.')->group(function () {
   Route::resource('/', AdminController::class);
   Route::resource('home', AdminController::class);
   Route::resource('articles', ArticleController::class)->except(['show']);
   Route::resource('sizes', SizeController::class)->except(['show']);
   Route::resource('colors', ColorController::class)->except(['show']);
   Route::delete('/picture/{picture}', [PictureController::class, 'destroy'])->name('picture.destroy')->where('picture', '[0-9]+');
});
