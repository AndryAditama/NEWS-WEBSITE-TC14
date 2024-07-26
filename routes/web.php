<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CategoryController;

Route::get('/', [VisitorController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [VisitorController::class, 'showdetail'])->name('post');
Route::get('/search', [VisitorController::class, 'search'])->name('search');


// route ke halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authentikasi fitur yang dapat diakses Admin
Route::middleware(['auth'])->group(function () {
   // Route user admin untuk CRUD Category
   Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
   Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
   Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
   Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

   // Route user admin untuk CRUD News
   Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');
   Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');
   Route::get('/admin/news/edit-news/{id}', [NewsController::class, 'edit'])->name('admin.news.edit-news');
   Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
   Route::get('/admin/news/create-news', [NewsController::class, 'create'])->name('admin.news.create');
   Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
   Route::get('/admin/news/{slug}', [NewsController::class, 'show'])->name('admin.detail.news');

   // Route user admin untuk CRUD Author
   Route::get('/admin/author', [UserController::class, 'index'])->name('admin.author');
   Route::post('/admin/author', [UserController::class, 'store'])->name('admin.author.store');
   Route::delete('/admin/author/{id}', [UserController::class, 'destroy'])->name('admin.author.delete');
   Route::put('/admin/author/{id}', [UserController::class, 'update'])->name('admin.author.update');

   // Route user admin Halaman Home/Dashboard
   Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');

   Route::get('/admin/settings', [UserController::class, 'setting'])->name('admin.profil');
   Route::put('/admin/settings/{id}', [UserController::class, 'updateSetting'])->name('admin.update.profil');
});

// Route::middleware(['auth', RoleMiddleware::class . ':penulis'])->group(function () {
//    // Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
//    // Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
//    // Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
//    // Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

//    // // Route user admin untuk CRUD News
//    // Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');
//    // Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');
//    // Route::get('/admin/news/edit-news/{id}', [NewsController::class, 'edit'])->name('admin.news.edit-news');
//    // Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
//    // Route::get('/admin/news/create-news', [NewsController::class, 'create'])->name('admin.news.create');
//    // Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
//    // Route::get('/admin/news/{slug}', [NewsController::class, 'show'])->name('admin.detail.news');

//    // // Route user admin Halaman Home/Dashboard
//    // Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
// });
