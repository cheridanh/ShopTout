<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ColorController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ArticleAppController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}-{article}', [ArticleAppController::class, 'show'])->name('articles.show')->where([
    'article' => '[0-9]+',
    'slug' => '[0-9a-zA-Z\-]+',
]);

// interfaces form administration !!!
Route::name('admin.')->prefix('admin')->group(function () {
   Route::resource('/', AdminController::class);
   Route::resource('home', AdminController::class);
   Route::resource('articles', ArticleController::class)->except(['show']);
   Route::resource('sizes', SizeController::class)->except(['show']);
   Route::resource('colors', ColorController::class)->except(['show']);
});
