<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('home', ['title' => 'Home Page'], ['name' => 'John Doe']);
});

Route::get('/news', function () {
   return view('news', ['title' => 'News Page']);
});

Route::get('/category', function () {
   return view('category', ['title' => 'Category Page']);
});
