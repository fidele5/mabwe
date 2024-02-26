<?php

use App\Http\Controllers\CompanyAdController;
use App\Http\Controllers\CompanyController;
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
Route::get('/post', [HomeController::class, 'posts'])->name("posts");
Route::get('/post/{id}/single', [HomeController::class, 'single'])->name("single");
Route::get('/category/{id}/posts', [HomeController::class, 'category'])->name("category");
Route::post("comment", [HomeController::class, "comment"])->name("comment");
Route::get("company/{type}/single", [HomeController::class, "companies"])->name("companies");
Route::get("company/{id}", [HomeController::class, "company"])->name("company");
Route::get("about", [HomeController::class, "about"])->name("about");
Route::get("partners", [HomeController::class, "partners"])->name("partners");
Route::get("contact", [HomeController::class, "contact"])->name("contact");

Auth::routes();

Route::middleware("auth")->group(function(){
    Route::prefix("admin")->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('post', PostController::class);
        Route::resource('video-post', VideoPostController::class);
        Route::resource('ads', CompanyAdController::class);
        Route::resource('post-category', PostCategoryController::class);
        Route::resource('company-type', CompanyTypeController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('company', CompanyController::class);
    });
});
