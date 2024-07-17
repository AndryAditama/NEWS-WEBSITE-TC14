<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('home', ['name' => 'John Doe']);
});

Route::get('/news', function () {
   return view('news');
});

Route::get('/category', function () {
   return view('category');
});
