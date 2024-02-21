<?php

use App\Http\Controllers\CompanyAdController;
use App\Http\Controllers\CompanyTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VideoPostController;
use App\Models\PostCategory;
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

Route::get('/', [HomeController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix("admin")->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('video-post', VideoPostController::class);
    Route::resource('ads', CompanyAdController::class);
    Route::resource('post-category', PostCategoryController::class);
    Route::resource('company-type', CompanyTypeController::class);
    Route::resource('settings', SettingController::class);
});
