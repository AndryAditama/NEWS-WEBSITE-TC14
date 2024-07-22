<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [adminController::class, 'hitungBerita'])->name('admin.home');

Route::get('/admin/', function () {
   return view('admin.home', ['title' => 'Halaman Home'], ['name' => 'John Doe']);
});

Route::get('/admin/news', function () {
   return view('admin.news', ['title' => 'Halaman Berita']);
});

Route::get('/admin/category', [adminController::class, 'index'])->name('admin.category');
Route::post('/admin/category', [adminController::class, 'store'])->name('admin.category.store');
Route::put('/admin/category/{id}', [adminController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/category/{id}', [adminController::class, 'destroy'])->name('admin.category.delete');

Route::get('/admin/news', [adminController::class, 'showBerita'])->name('admin.news');
Route::delete('/admin/news/{id}', [adminController::class, 'destroyBerita'])->name('admin.news.delete');

Route::get('/admin', [adminController::class, 'hitungBerita'])->name('admin.home');
